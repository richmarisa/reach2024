<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $fillable = ['project_id','term_id','post_id','allocation','created_at','updated_at'];
}
