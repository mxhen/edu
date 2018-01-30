<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homework extends Model
{
    protected $table='homework';
    protected $fillable=['owner','homework','course'];
}
