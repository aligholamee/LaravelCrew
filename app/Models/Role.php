<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Configure the model
    protected $table = 'role';
    public $primary_key = 'uuid';
}
