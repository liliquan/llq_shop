<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'user_address';
    protected $fillable = ['name','address','phone','user_id'];
    public $timestamps = false;

}
