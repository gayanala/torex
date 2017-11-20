<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherItemRequestedToDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->string('other_item_requested')->nullable()->after('item_requested');
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
            $table->dropColumn(['other_item_requested']);
        });
    }
}
