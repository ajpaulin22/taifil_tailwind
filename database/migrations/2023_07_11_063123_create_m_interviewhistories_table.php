<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMInterviewhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_interviewhistories', function (Blueprint $table) {
            $table->id();
            $table->integer("PersonalInfoID");
            $table->string("AttendInterview")->nullable();
            $table->datetime("InterviewDate")->nullable();
            $table->string("Company")->nullable();
            $table->integer("IsDeleted")->default(0)->length(1);
            $table->string("CreateID")->nullable();
            $table->string("UpdateID")->nullable();
            $table->datetime("created_at")->nullable();
            $table->datetime("updated_at")->nullable();
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
        Schema::dropIfExists('m_interviewhistories');
    }
}
