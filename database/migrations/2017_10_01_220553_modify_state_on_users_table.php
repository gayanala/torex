<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStateOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->char('state',2)->after('city');
            $table->foreign('state')->references('state_code')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('state')->after('city');
        });
    }
}
