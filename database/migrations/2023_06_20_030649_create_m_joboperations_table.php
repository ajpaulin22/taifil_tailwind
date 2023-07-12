<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJoboperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_joboperations', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("JobCategoriesID");
            $table->string("Operation");
            $table->integer("Hiring")->default(0)->length(1);
            $table->integer("IsDeleted")->default(0)->length(1);
            $table->string("CreateID");
            $table->datetime("CreateDate");
            $table->string("UpdateID");
            $table->datetime("UpdateDate");
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
        Schema::dropIfExists('m_joboperations');
    }
}
