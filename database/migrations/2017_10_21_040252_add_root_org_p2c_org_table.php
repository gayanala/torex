<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRootOrgP2cOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->integer('root_org_id')->unsigned()->index()->nullable()->first();
            $table->foreign('root_org_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->dropForeign(['root_org_id']);
            $table->dropColumn('root_org_id');
        });
    }
}
