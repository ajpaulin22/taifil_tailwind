<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("personal_id");
            $table->string("father_name")->nullable();
            $table->dateTime("father_birth")->nullable();
            $table->string("father_occupation")->nullable();
            $table->string("father_cp")->nullable();
            $table->string("father_address")->nullable();
            $table->string("mother_name")->nullable();
            $table->dateTime("mother_birth")->nullable();
            $table->string("mother_occupation")->nullable();
            $table->string("mother_cp")->nullable();
            $table->string("mother_address")->nullable();
            $table->string("spouse_name")->nullable();
            $table->dateTime("spouse_birth")->nullable();
            $table->string("spouse_occupation")->nullable();
            $table->string("spouse_cp")->nullable();
            $table->string("spouse_address")->nullable();
            $table->string("partner_name")->nullable();
            $table->dateTime("partner_birth")->nullable();
            $table->string("partner_occupation")->nullable();
            $table->string("partner_cp")->nullable();
            $table->string("partner_address")->nullable();
            $table->boolean("went_japan");
            $table->integer("how_many_japan")->nullable();
            $table->datetime("when_japan")->nullable();
            $table->string("where_japan")->nullable();
            $table->boolean("overstay_japan")->nullable();
            $table->string("how_long_overstay")->nullable();
            $table->boolean("fake_identity_japan")->nullable();
            $table->string("fake_identity_purpose")->nullable();
            $table->boolean("fake_identity_surrender")->nullable();
            $table->boolean("applied_visa");
            $table->string("type_visa")->nullable();
            $table->dateTime("when_applied_visa")->nullable();
            $table->boolean("approved")->nullable();
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
        Schema::dropIfExists('family_datas');
    }
}
