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
        Schema::create('goods_image',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->unsignedInteger('goods_id')->comment('图片id')->notnull;
            $table->String('path')->comment('图片地址')->notnull;
        }) ;   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_image');                
    }
}
