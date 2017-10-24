<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovedDollarAmountEmailIndDonationRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->decimal('approved_dollar_amount',11,2)->default(0.00)->nullable()->after('marketing_opportunities');
            $table->boolean('email_sent')->default(false)->after('approval_status_id');
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
            $table->dropColumn(['approved_dollar_amount','email_sent']);
        });
    }
}
