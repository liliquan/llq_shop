<?php

namespace App\Models;
use DB;
use Hash;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function adduser()
    {
        return DB::table('user')->insert(['username'=>$_POST['username'],
        'password'=>Hash::make($_POST['password']),
        'phone_num'=>$_POST['mobile']]);
    }

}
