<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocationalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocational_datas', function (Blueprint $table) {
            $table->id();
            $table->integer("educational_id");
            $table->string("name");
            $table->string("address");
            $table->datetime("from");
            $table->datetime("until");
            $table->string("course");
            $table->string("certificate");
            $table->datetime("certificate_until");
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
        Schema::dropIfExists('vocational_datas');
    }
}
