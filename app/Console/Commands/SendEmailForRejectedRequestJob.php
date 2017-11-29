<?php

namespace App\Console\Commands;

use App\Custom\Constant;
use App\DonationRequest;
use App\Events\SendAutoRejectEmail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SendEmailForRejectedRequestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:sendemailforrejectedrequestsjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email sent successfully for rejected request.';

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
                Log::info('Running job: SendEmailForRejectedRequestJob');
                $this->info('Running job: SendEmailForRejectedRequestJob');
                $expired_requests = DonationRequest::where('updated_at', '<=', Carbon::now()->subDays(Constant::DELAYED_EMAIL_DURATION_FOR_REJECT_REQUESTS))
                    ->where('approval_status_id', Constant::REJECTED)
                    ->where('email_sent', Constant::INACTIVE)
                    ->get();

                // Loop iterate over expired requests and send email to each requester
                foreach ($expired_requests as $expired_request) {
                    event(new SendAutoRejectEmail($expired_request));
                    usleep(500000);
                }

                // Update all expired requests.
                if (count($expired_requests) > 0) {

                    DB::table('donation_requests')
                        ->where([
                            ['updated_at', '<=', Carbon::now()->subDays(2)],
                            ['email_sent', Constant::INACTIVE],
                            ['approval_status_id', Constant::REJECTED]
                        ])
                        ->update([
                            'email_sent' => Constant::ACTIVE,
                            'updated_at' => Carbon::now()
                        ]);
                    Log::info('Email sent for Rejected Donation Requests!');
                    $this->info('Email sent for Rejected Donation Requests!');
                } else
                    $this->info('No rejected request found older than 2 days');


            });
    }
}
