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
            $table->id();
            $table->string('username', 20)->unique()->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->string('token', 10)->nullable()->comment('token');
            $table->string('name', 20)->comment('姓名');
            $table->string('email', 30)->comment('Email');
            $table->string('mobile', 10)->unique()->comment('手機號碼，台灣手機');
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
        Schema::dropIfExists('users');
    }
}
