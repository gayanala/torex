<?php

namespace App\Console\Commands;

use App\DonationRequest;
use App\Events\SendAutoRejectEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Listeners\SendAutoRejectMessage;


class CronJobExpiredDonationRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request status updated successfully.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("America/Belize");

        DB::transaction(
            function () {
//                $expired_requests = DB::select('select * from donation_requests where needed_by_date <=  CURRENT_DATE', [5000]);
//                dd($expired_requests);

                $expired_requests = DonationRequest::where('needed_by_date', '<=', date('Y-m-d'))->get();
//                dd($expired_requests);

                //    print_r($expired_requests);

                $rejected_status_id_in_db = DB::table('approval_statuses')->where('status_name', 'Rejected')->value('id');
                //      $this->info($rejected_status_id_in_db);

                // Update all expired requests.
                DB::table('donation_requests')
                    ->where('needed_by_date', '<=', date("Y-m-d"))
                    ->update(['approval_status_id' => $rejected_status_id_in_db]);



                // Loop iterate over expired requests and send email to each requester
                foreach ($expired_requests as $expired_request) {

                    $this->info($expired_request->email);
                    event(new SendAutoRejectEmail($expired_request));
                    $this->info($expired_request->approval_status_id);
                    // Call SENT EMAIL FUNCTION using $expired_request->email
                }

                // $this->info(DATE(NOW()));
                // $this->info(date("Y-m-de"));
                // $expired_requests = DB::select('select * from donation_requests where needed_by_date <=  CURRENT_DATE ', [5000]);
                // print_r($expired_requests);
            });

        Log::info('Expired Donation Request Status Updated To REJECTED!');
        $this->info('Request Status Updated Successfully!');
    }
}
