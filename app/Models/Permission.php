<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // Configure the model
    protected $table = 'permission';
    public $primary_key = 'uuid';
}
