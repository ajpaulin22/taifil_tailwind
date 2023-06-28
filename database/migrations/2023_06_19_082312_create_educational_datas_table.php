<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("personal_id");
            $table->string("name_elem");
            $table->string("address_elem");
            $table->datetime("from_elem");
            $table->datetime("until_elem");
            $table->string("name_highschool");
            $table->string("address_highschool");
            $table->datetime("from_highschool");
            $table->datetime("until_highschool");
            $table->string("name_jp_lang")->nullable();
            $table->string("address_jp_lang")->nullable();
            $table->datetime("from_jp_lang")->nullable();
            $table->datetime("until_jp_lang")->nullable();
            $table->string("certificate_jp_lang")->nullable();
            $table->datetime("certificate_until_jp_lang")->nullable();
            $table->string("name_college");
            $table->string("address_college");
            $table->datetime("from_college");
            $table->datetime("until_college");
            $table->string("course_college");
            $table->string("certificate_college");
            $table->datetime("certificate_until_college");
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
        Schema::dropIfExists('educational_datas');
    }
}
