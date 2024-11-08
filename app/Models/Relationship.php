<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $connection="production";
    protected $table="wp_term_relationships";
}