<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->String('power_name')->comment('权限名')->notnull;
            $table->String('power_desc')->comment('权限描述')->notnull;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('power');                                
    }
}
