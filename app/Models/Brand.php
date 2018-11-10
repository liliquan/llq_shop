<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // 通过table在模型上定义属性来指定自定义的表
    protected $table = 'brand';
    protected $fillable = ['brand_name','logo','country','desc'];
    // 如果希望添加时间
    public $timestamps = true;
}
