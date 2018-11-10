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
        Schema::create('goods_SKU',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->unsignedInteger('good_id')->comment('商品id')->notnull;
            $table->String('sku_name')->comment('sku名称')->notnull;
            $table->unsignedInteger('stock')->comment('库存量')->notnull;
            $table->String('price')->comment('价格')->notnull;
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
