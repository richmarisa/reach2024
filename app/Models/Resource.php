<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','color','textcolor','resourcerole','archived','created_at','updated_at'];
}
