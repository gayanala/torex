<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
