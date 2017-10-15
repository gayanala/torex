<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_rules', function (Blueprint $table) {
            $table->integer('organization_id')->unsigned()->index();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->integer('rule_id')->unsigned()->index();
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->dropForeign(['rule_id']);
            $table->dropColumn('rule_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_rules');
        Schema::table('parent_child_organizations', function (Blueprint $table) {
            $table->integer('rule_id')->unsigned()->index()->after('child_org_id');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
        });
    }
}
