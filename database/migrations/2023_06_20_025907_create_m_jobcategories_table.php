<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJobcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jobcategories', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("JobCodeID")->nullable();
            $table->string("Category")->nullable();
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
        Schema::dropIfExists('m_jobcategories');
    }
}
