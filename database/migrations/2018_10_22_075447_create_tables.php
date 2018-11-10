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
        Schema::create('goods_brand',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->String('brand')->comment('品牌')->notnull;
            $table->String('goods_id')->comment('商品id')->notnull;
        }) ;  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_brand');                
    }
}
