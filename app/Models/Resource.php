<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','color','textcolor','resourcerole'];
    public function resourcerole() {
        return $this->belongsTo('App\Models\Resourcerole');
    }
}
