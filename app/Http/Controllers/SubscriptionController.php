<?php
namespace App\Http\Controllers;
use App\Organization;
use App\ParentChildOrganizations;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Session;

class SubscriptionController extends Controller
{
    protected $organization;
    public function getIndex()
    {
        $id = Auth::user()->organization_id;
        //if organization is child and it's parent org does not have a active subscription redirect it to 'subscription expired' page
        $ischild = ParentChildOrganizations::where('child_org_id', '=', $id)->exists();
        $organization = Organization::findOrFail($id);
        if ($ischild) {  //checks if the current org is child
            $parentOrgid = ParentChildOrganizations::where('child_org_id', $id)->value('parent_org_id');
            $organization = Organization::findOrFail($parentOrgid);
            //checks if organization subscription records exists and organization's subscription end date is greater or equal to today
            if ($organization->subscribed('main') AND $organization->trial_ends_at->gte(Carbon::now())) {
                    return redirect('/dashboard');
            } else {
                return view('subscriptions.expiredsubscription');
            }
        } else {
            if ($organization->subscribed('main') AND $organization->trial_ends_at->gte(Carbon::now())) {
                return redirect('/dashboard');
            } else {
                return view('subscriptions.payment');
            }
        }
    }
    public function postJoin(Request $request)
    {
        $id = Auth::user()->organization_id;

        $organization = Organization::find($id);
        $locations = $request->input('user_locations');

        $pickedPlan = $request->get('plan');
        $plan = $pickedPlan . $locations;

        $coupon = $request->get('coupon');
        if ($organization->subscribedToPlan($plan, 'main')) {
            return redirect('subscription')->with('status', 'Plan Already Submitted!');
        } else {
            if ($request->input('plan') == "Annually") {
                if (isset($coupon)) {
                    $organization->newSubscription('main', $plan)->withCoupon($coupon)->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                        'email' => $organization->org_name

                    ]);

                } else {
                    $organization->newSubscription('main', $plan)->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                        'email' => $organization->org_name

                    ]);

                }
                $organization->trial_ends_at = Carbon::now()->addYear(1);
                $organization->save();
            } else {
                if ($request->input('plan') == "Monthly") {

                    if (isset($coupon)) {

                        $organization->newSubscription('main', $plan)->withCoupon($coupon)->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                            'email' => $organization->org_name
                        ]);

                    } else {
                        $organization->newSubscription('main', $plan)->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                            'email' => $organization->org_name
                        ]);

                    }
                    $organization->trial_ends_at = Carbon::now()->addMonth(1);
                    $organization->save();
                }
            }

            return redirect('/dashboard')->with('status', 'Successfully Submitted!');

        }
    }

    public function chargeSuccess(Request $request)
    {
        $date = \Carbon\Carbon::now();
        $organization = organization::find(1);
        $webhook = new WebhookController;
        $arrData = $webhook->handleWebhook($request);
        $objHookObject = $arrData->object;
        $objMetaData = $objHookObject->metadata;
        $table = config('variables.tbl_subscription');
        $arrInsert = array('name' => 'main', 'stripe_id' => $arrData->object->id, 'stripe_plan' => $arrData->plan->id, 'quantity' => $arrData->quantity, 'organization_id' => $objMetaData->organization_id, 'created_at' => date('Y-m-d h:i:s', strtotime($date)), 'updated_at' => date('Y-m-d h:i:s', strtotime($date)));
        $data = DB::table($table)->insertGetId($arrInsert);

    }

    public function cancel()
    {
        $id = Auth::user()->organization_id;
        $organization = Organization::find($id);
        $organization->subscription('main')->cancel();
        if ($organization->subscription('main')->cancelled()) {
            $endsAt = DB::table('subscriptions')->where('organization_id', Auth::user()->organization_id)->value('ends_at');
            $endsAt = \Carbon\Carbon::parse($endsAt)->format('m-d-Y');

            return redirect('organizations')->with('message', "Subscription ends at: $endsAt");
        } else {
            return redirect('organizations')->with('message', 'Please contact Tagg administrator to end the subscription');
        }

    }

    public function resume()
    {

        $organization = Organization::find(Auth::user()->organization_id);
        if ($organization->subscription('main')->onGracePeriod()) {
            $organization->subscription('main')->resume();

            return redirect('organizations')->with('message', 'resumed');
        }

    }

    public function applycoupon(Request $request)
    {
        $coupon = $request->get('coupon');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $retrievedCoupon = \Stripe\Coupon::retrieve($coupon);
        return $retrievedCoupon->percent_off;

    }


}
