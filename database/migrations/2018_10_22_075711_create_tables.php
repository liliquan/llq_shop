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
        Schema::create('goods_class',function (Blueprint $table){
            $table->mediumIncrements('id');
            $table->String('class_name')->comment('分类名')->notnull;
            $table->String('parent_id')->comment('父ID')->notnull;
            $table->String('path')->comment('所有上级分类的id')->notnull;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_class');                        
    }
}
