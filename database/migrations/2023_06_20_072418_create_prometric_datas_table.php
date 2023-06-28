<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrometricDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prometric_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("personal_id");
            $table->string("name");
            $table->string("address");
            $table->dateTime("from");
            $table->dateTime("until");
            $table->string("certificate");
            $table->dateTime("cert_until");
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
        Schema::dropIfExists('prometric_datas');
    }
}
