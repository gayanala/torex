<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_name');
            $table->string('status_description')->nullable();
            $table->timestamps();
        });
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->integer('approval_status_id')->unsigned()->default(1);
            $table->foreign('approval_status_id')->references('id')->on('approval_statuses');
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
            $table->dropForeign(['approval_status_id']);
            $table->dropColumn('approval_status_id');
        });
        Schema::dropIfExists('approval_statuses');
    }
}
