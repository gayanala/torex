<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Http\Controllers\WebhookController;

class SubscriptionController extends Controller
{

    protected $organization;

    public function getIndex()
    {
        return view('subscriptions.payment');
    }

    public function postJoin(Request $request)
    {
        $organization = organization::find(1);
        $pickedPlan = $request->get('plan');
        if ($organization->subscribedToPlan($pickedPlan, 'main')) {
            return redirect('subscription')->with('status', 'Plan Allready Submitted!');
        } else {
            if ($request->input('plan') == "annually") {
                $organization->newSubscription('main', $request->input('plan'))->withCoupon("OFF20")->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                    'email' => 'shashikala@gmail.com'

                ]);
            } else {
                $organization->newSubscription('main', $request->input('plan'))->withMetadata(array('organization_id' => $organization->id))->quantity($request->input('user_locations'))->create($request->input('token'), [
                    'email' => 'shashikala@gmail.com'
                ]);
            }

            return redirect('subscription')->with('status', 'Successfully Submitted!');
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

    public function subscribe(Request $request)
    {
        return view('stripe.subscribe');
    }

}
