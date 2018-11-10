<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     * CURRENT_TIMESTAMP
     * @return void
     */
    public function up()
    {
        Schema::create('admin',function(Blueprint $table){

            $table->mediumIncrements('id');
            $table->String('admin_name')->comment('管理员名')->notnull;
            $table->char('password')->comment('密码')->notnull;
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
        Schema::drop('admin');        
    }
}
