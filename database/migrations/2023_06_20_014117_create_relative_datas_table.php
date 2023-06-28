<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelativeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relative_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("family_id");
            $table->string("name")->nullable();
            $table->string("relation")->nullable();
            $table->string("cp")->nullable();
            $table->string("address")->nullable();
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
        Schema::dropIfExists('relative_datas');
    }
}
