<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiblingDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sibling_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("family_id");
            $table->string("sibling_name")->nullable();
            $table->dateTime("sibling_birth")->nullable();
            $table->string("sibling_occupation")->nullable();
            $table->string("sibling_cp")->nullable();
            $table->string("sibling_address")->nullable();
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
        Schema::dropIfExists('sibling_datas');
    }
}
