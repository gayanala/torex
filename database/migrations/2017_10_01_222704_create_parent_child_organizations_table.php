<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentChildOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_child_organizations', function (Blueprint $table) {
            $table->integer('parent_org_id')->unsigned()->index();
            $table->foreign('parent_org_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->integer('child_org_id')->unsigned()->index();
            $table->foreign('child_org_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_child_organizations');
    }
}
