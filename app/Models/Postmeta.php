<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postmeta extends Model
{
    protected $connection="production";
    protected $table="wp_postmeta";
}