<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonationRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DonationRequest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization');
            $table->string('formOrganization');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('taxexempt');
            $table->string('formRequestFor');
            $table->string('formDonationPurpose');
            $table->string('eventname');
            $table->string('eventdate');
            $table->string('enddate');
            $table->string('eventpurpose');
            $table->string('formAttendees');
            $table->string('venue');
            $table->string('marketingopportunities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DonationRequest');
    }
}
