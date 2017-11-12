<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileUrlToDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->string('file_url',200)->nullable()->after('tax_exempt');
        });
        Schema::dropIfExists('files');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->dropColumn('file_url');
        });
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_path');
            $table->string('file_type');
            $table->string('original_filename')->nullable();
            $table->integer('organization_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('files', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }
}
