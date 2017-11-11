<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovalStatusReasonToDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->string('approval_status_reason')->nullable()->after('approval_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->dropColumn('approval_status_reason');
        });
    }
}
