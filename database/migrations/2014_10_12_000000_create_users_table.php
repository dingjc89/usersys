<?php

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
            $table->increments('user_id');
            $table->string('name')->comment('帐号');
            $table->string('email')->unique();
            $table->enum('sex',['0','1'])->default('0')->comment('性别:0 man 1 wolman');
            $table->string('password')->comment('密码');
            $table->string('addr')->null()->comment('地址');
            $table->enum('supper',['0','1'])->default('0')->commnet('系统管理员：0不是，1是');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
