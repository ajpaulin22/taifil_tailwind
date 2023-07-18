<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_datas', function (Blueprint $table) {
            $table->id();
            // $table->string("code");
            $table->string("job_cat");
            $table->string("operation");
            $table->string("last_name");
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("nickname");
            $table->string("lastname");
            $table->text("address");
            $table->dateTime("date_birth");
            $table->string("place_birth");
            $table->string("gender");
            $table->string("citizenship");
            $table->integer("age");
            $table->string("bloodtype");
            $table->string("civil_status");
            $table->string("contact");
            $table->integer("height");
            $table->string("religion");
            $table->text("facebook");
            $table->boolean("smoking");
            $table->integer("weight");
            $table->boolean("jap_reading")->nullable();
            $table->boolean("jap_writing")->nullable();
            $table->boolean("jap_speaking")->nullable();
            $table->boolean("jap_listening")->nullable();
            $table->text("other_lang")->nullable();
            $table->integer("shoe_size");
            $table->string("hobbies");
            $table->string("person_to_notify");
            $table->string("person_relation");
            $table->string("person_address");
            $table->string("person_contact");
            $table->string("passport_no");
            $table->dateTime("issue_date")->nullable();
            $table->dateTime("expiry_date")->nullable();
            $table->string("issue_place");
            $table->boolean("allergy");
            $table->string("food_alergy")->nullable();
            $table->boolean("tattoo");
            $table->boolean("drivers_licensed");
            $table->string("type_licensed")->nullable();
            $table->dateTime("valid_licensed")->nullable();
            $table->binary("id_picture")->nullable();
            $table->binary("gov_id_picture")->nullable();
            $table->binary("passport_id_picture")->nullable();
            $table->integer("isdeleted")->default(0)->length(1);
            $table->integer("to_abroad")->default(0)->length(1);
            $table->datetime("abroad_date")->nullable();
            $table->string("job_type");
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
        Schema::dropIfExists('personal_datas');
    }
}
