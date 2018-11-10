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
        Schema::create('goods_attribute',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->String('attr_name')->comment('属性名')->notnull;
            $table->String('attr_value')->comment('属性值')->notnull;
            $table->unsignedInteger('good_id')->comment('商品id')->notnull;
        }) ;  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_attribute');                
    }
}
