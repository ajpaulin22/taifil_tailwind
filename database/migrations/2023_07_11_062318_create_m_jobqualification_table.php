<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJobqualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jobqualifications', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("JobQualificationsID");
            $table->string("Qualification");
            $table->integer("IsDeleted")->default(0)->length(1);
            $table->string("CreateID")->nullable();
            $table->string("UpdateID")->nullable();
            $table->datetime("created_at")->nullable();
            $table->datetime("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_jobqualification');
    }
}