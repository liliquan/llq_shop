<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $table = 'power';
    protected $fillable = ['power_name','power_desc'];
    public $timestamps = false;

}

