<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->char('state',2)->references('state_code')->on('states')->after('city');
            $table->integer('organization_type_id')->after('org_name');
            $table->foreign('organization_type_id')->references('id')->on('organization_types');
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
            $table->dropColumn([
                'state',
                'organization_type_id'
            ]);
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('state')->after('city');
        });
    }
}
