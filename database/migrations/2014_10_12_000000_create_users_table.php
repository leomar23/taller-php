<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('last_name',150)->nulleable()->default('Pérez');
            $table->string('phone',20)->nulleable()->default('0800 Leo');
            $table->date('birth_date')->default('1985-01-01');
            $table->string('gender',10)->nulleable()->default('Unisex');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->integer('status_id')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
