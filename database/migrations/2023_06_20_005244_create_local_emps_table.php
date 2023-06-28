<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_emps', function (Blueprint $table) {
            $table->id();
            $table->foreignId("personal_id");
            $table->string("company_name");
            $table->string("position");
            $table->string("company_address");
            $table->dateTime("from");
            $table->dateTime("until");
            $table->integer("isdeleted")->default(0)->length(1);
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
        Schema::dropIfExists('local_emps');
    }
}
