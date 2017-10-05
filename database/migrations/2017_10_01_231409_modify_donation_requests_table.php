<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->dropColumn([
                'state',
                'requester_type',
                'item_requested',
                'item_purpose',
                'event_purpose',
                'est_attendee_count'
            ]);
        });
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->char('state',2)->after('city');
            $table->foreign('state')->references('state_code')->on('states');
            $table->integer('requester_type')->unsigned()->index()->after('requester');
            $table->foreign('requester_type')->references('id')->on('requester_types');
            $table->integer('item_requested')->unsigned()->index()->after('tax_exempt');
            $table->foreign('item_requested')->references('id')->on('request_item_types');
            $table->integer('item_purpose')->unsigned()->index()->after('item_requested');
            $table->foreign('item_purpose')->references('id')->on('request_item_purposes');
            $table->string('other_item_purpose')->nullable()->after('item_purpose');
            $table->integer('event_type')->unsigned()->index()->after('event_name');
            $table->foreign('event_type')->references('id')->on('request_event_types');
            $table->integer('est_attendee_count')->unsigned()->index()->after('event_type');

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
            $table->dropColumn([
                'state',
                'requester_type',
                'item_requested',
                'item_purpose',
                'other_item_purpose',
                'event_type',
                'est_attendee_count'
            ]);
        });
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->string('state')->after('city');
            $table->string('requester_type');
            $table->string('item_requested');
            $table->string('item_purpose');
            $table->string('event_purpose');
            $table->string('est_attendee_count');
        });
    }
}
