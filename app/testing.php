<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testing extends Model
{
    protected $table="testings";
    protected $fillable=['name','email','password','image'];
}
