<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


        DB::transaction(
            function () {
                $expired_requests = DB::select('select * from donation_requests where needed_by_date <=  CURRENT_DATE ', [5000]);
                print_r($expired_requests);

                // Update all expired requests.
                //      DB::table('donation_requests')->where('needed_by_date', DATE(NOW()))->update(['city' => 'HOORAY']);
                //   DB::table('donation_requests')->where('id', 1)->update(['approval_status_id' => 2]);
                DB::table('donation_requests')->where('needed_by_date', date("Y-m-d"))->update(['city' => 'HOORAY']);

                // Loop iterate over expired requests and send email to each requester
                foreach ($expired_requests as $expired_request) {
                    $this->info($expired_request->email);
                    $this->info($expired_request->approval_status_id);
                    // Call SENT EMAIL FUNCTION using $expired_request->email
                }


                // $this->info(date("Y-m-d"));

            });

        Log::info('Expired Donation Request Status Updated To REJECTED!');
        $this->info('Request Status Updated Successfully!');
    }
}
