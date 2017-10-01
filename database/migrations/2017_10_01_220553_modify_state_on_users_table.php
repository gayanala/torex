<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
        Schema::table('organizations', function (Blueprint $table) {
            $table->char('state',2)->references('state_code')->on('states')->after('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('state')->after('city');
        });
    }
}
