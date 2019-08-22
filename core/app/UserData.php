<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_datas';

    protected $fillable = ['account_name','account_number','bank','created_at','updated_at'];

}