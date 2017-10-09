<?php

use App\Approval_status;
use Illuminate\Database\Seeder;

class Approval_statusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('approval_statuses')->delete();
        Approval_status::create(['id' => 1, 'status_name' => 'Submitted', 'status_description' => 'Request submitted to business for review.']);
        Approval_status::create(['id' => 2, 'status_name' => 'Pending Rejection', 'status_description' => 'Request flagged as ready for business to reject.']);
        Approval_status::create(['id' => 3, 'status_name' => 'Pending Approval', 'status_description' => 'Request flagged as ready for business to approve.']);
        Approval_status::create(['id' => 4, 'status_name' => 'Rejected', 'status_description' => 'Request rejected by business.']);
        Approval_status::create(['id' => 5, 'status_name' => 'Approved', 'status_description' => 'Request accepted by business.']);
    }
}
