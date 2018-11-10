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
        Schema::create('goods',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->String('goods_name')->comment('商品名字')->notnull;
            $table->String('logo')->comment('商品logo')->notnull;
            $table->longText('desc')->comment('商品描述')->notnull;
            $table->unsignedInteger('brand_id')->comment('品牌id')->notnull;
            $table->String('place')->comment("商品原产地")->notnull;
            $table->unsignedInteger('cat_1')->comment('一级分类')->notnull;
            $table->unsignedInteger('cat_2')->comment('二级分类')->notnull;
            $table->unsignedInteger('cat_3')->comment('三级分类')->notnull;
            $table->timestamps();
        }) ;    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');        
    }
}
