<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //  通过table在模型上定义属性来指定自定义的表
    protected $table = 'admin';
    protected $fillable = ['admin_name','password','role'];
    // 如果希望添加时间
    public $timestamps = true;
    
}
