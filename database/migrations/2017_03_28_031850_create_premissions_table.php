<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions',function(Blueprint $table){
            $table->increments('permission_id')->comment('权限ID');
            $table->string('table',100)->comment('模块');
            $table->string('name',100)->comment('权限');
            $table->string('desc',100)->comment('说明');
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
        Schema::drop('permissions');
    }
}
