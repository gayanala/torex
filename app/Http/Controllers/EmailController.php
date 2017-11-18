<?php

namespace App\Http\Controllers;

use App\Custom\Constant;
use App\DonationRequest;
use App\Mail\SendManualRequest;
use Auth;
use Illuminate\Http\Request;
use Mail;


class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*   public function email(){

           Mail::send(

               ['text'=>'emails.startmail'],[],function($message){
               $message->to(Auth::user()->email,Auth::user()->first_name)->subject('Welcome to CharityQ');
               $message->from('tagg@gmail.com','tagg');
           });
           Mail::to(Auth::user()->email)->send(new RegistrationSuccessful(Auth::user()));

           return redirect('\home');

       }*/

    /**
     * Gets email ids, edited email template and sends email by calling SendManualRequest Mailable
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function manualRequestMail(Request $request) {

        //get donation request ids by converting string to array
        $ids_array = explode(',', $request->ids_string); //split string into array separated by ', '

        //get email ids
        $emails = DonationRequest::whereIn('id', $ids_array)->pluck('email');
        $names = str_replace(array('":"')," ", $request-> names);
        $names =str_replace(array("{", "}", '"'),"", $names);
        $names = explode(',', $names);

        // Storing the existing template that was populated in the editor
        $default_template = $request->email_message;

        foreach($emails as $index => $email) {
            $request->email_message = str_replace('{Requester Name}', $names[$index], $request->email_message);
            $request->email_message = str_replace('{My Business Name', Auth::user()->organization->org_name, $request->email_message);

            $donation_id = $ids_array[$index];
            $donation = DonationRequest::where('id', $donation_id)->get();

            if($request->status == 'Approve'){
                //update donation request status in database
                $donation[0]->update(['approval_status_id' => Constant::APPROVED]);
                $donation[0]->update(['approval_status_reason' => 'Approved Manually']);
            } elseif($request->status == 'Reject'){
                $donation[0]->update(['approval_status_id' => Constant::REJECTED]);
                $donation[0]->update(['approval_status_reason' => 'Rejected Manually']);
            }
            $donation[0]->update(['approved_organization_id' => Auth::user()->organization_id]);
            $donation[0]->update(['approved_user_id' => Auth::id()]);


            Mail::to($email)->send(new SendManualRequest($request));
            $request->email_message = $default_template;
        }

        $redirect_to = $request->page_from;
        return redirect($redirect_to);
    }
}