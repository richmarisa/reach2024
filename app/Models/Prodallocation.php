<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodallocation extends Model
{
    protected $connection="production";
    protected $table="wgc_allocations";
}
