<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveFieldToUsersOrganizationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->boolean('active')->default(true)->after('monthly_budget');
        });
/*        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->boolean('active')->default(true)->after('child_org_id');
        });*/
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->default(true)->after('remember_token');
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
            $table->dropColumn(['active']);
        });
/*        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->dropColumn(['active']);
        });*/
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['active']);
        });
    }
}
