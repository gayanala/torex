<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMarketingOpportunitiesLengthDonationRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->string('marketing_opportunities',1000)->change();
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
            $table->string('marketing_opportunities')->change();
        });
    }
}
