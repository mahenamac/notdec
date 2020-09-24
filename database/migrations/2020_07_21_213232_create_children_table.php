<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('guardian_id');
            $table->uuid('referee_id');
            $table->string('admission_number');
            $table->string('name');
            $table->string('gender');
            $table->date('birthdate')->nullable();
            $table->integer('birth_order')->nullable();
            $table->string('clan')->nullable();
            $table->string('religion')->nullable();
            $table->string('totem')->nullable();
            $table->string('father')->nullable();
            $table->string('father_alive')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother')->nullable();
            $table->string('mother_alive')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('abandoned');
            $table->string('district')->nullable();
            $table->string('sub_county')->nullable();
            $table->string('parish')->nullable();
            $table->string('village')->nullable();
            $table->string('circumstances');
            $table->string('admission_reason');
            $table->string('health_condition');
            $table->string('care_order');
            $table->string('presiding_magistrate');
            $table->string('duration');
            $table->string('duration_type');
            $table->date('admission_date');
            $table->string('picture')->default('default.jpg');
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->foreign('referee_id')->references('id')->on('referees');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
