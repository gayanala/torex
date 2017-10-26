<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            //$table->dropForeign(['event_type']);
        });

        Schema::table('donation_requests', function (Blueprint $table) {
            $table->decimal('dollar_amount', 11, 2)->nullable()->default(0.00)->after('item_requested');
            $table->date('needed_by_date')->after('other_item_purpose');
            $table->integer('approved_organization_id')->unsigned()->index()->nullable()->after('marketing_opportunities');
            $table->foreign('approved_organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->integer('approved_user_id')->unsigned()->index()->nullable()->after('approved_organization_id');
            $table->foreign('approved_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('rule_process_date')->nullable()->after('approved_user_id');
            $table->string('event_name')->nullable()->change();
            //$table->string('event_type')->unsigned()->index()->nullable()->change();
            //$table->foreign('event_type')->references('id')->on('request_event_types');
            $table->string('est_attendee_count')->nullable()->change();
            $table->string('event_start_date')->nullable()->change();
            $table->string('event_end_date')->nullable()->change();
            $table->string('venue')->nullable()->change();
            $table->string('marketing_opportunities')->nullable()->change();
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
            $table->dropForeign(['approved_organization_id']);
            $table->dropForeign(['approved_user_id']);
            $table->dropColumn('dollar_amount');
            $table->dropColumn('needed_by_date');
            $table->dropColumn('approved_organization_id');
            $table->dropColumn('approved_user_id');
            $table->dropColumn('rule_process_date');
        });
    }
}
