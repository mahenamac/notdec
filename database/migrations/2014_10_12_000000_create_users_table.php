<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('staff_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->uuid('department_id');
            $table->uuid('group_id');
            $table->uuid('title_id');
            $table->string('account_status');
            $table->rememberToken();
            $table->date('last_login')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('title_id')->references('id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
