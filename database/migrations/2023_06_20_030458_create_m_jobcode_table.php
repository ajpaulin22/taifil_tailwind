<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJobcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jobcodes', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("Code")->nullable();
            $table->integer("IsDeleted")->default(0)->length(1);
            $table->string("CreateID")->nullable();
            $table->datetime("CreateDate")->nullable();
            $table->string("UpdateID")->nullable();
            $table->datetime("UpdateDate")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_jobcodes');
    }
}
