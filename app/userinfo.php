<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    protected $table="userinfos";
    protected $fillable=['owner','name','phone','wechat','qq','email'];
}
