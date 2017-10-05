<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            /*if (Schema::hasColumn('organizations','state'))
            {*/
            //s$table->dropForeign('organizations_state_foreign');
            $table->dropColumn('state');
            //}

        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->char('state',2)->after('city');
            $table->foreign('state')->references('state_code')->on('states')->onDelete('cascade');
            $table->integer('organization_type_id')->unsigned()->after('org_name');
            $table->foreign('organization_type_id')->references('id')->on('organization_types')->onDelete('cascade');
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
