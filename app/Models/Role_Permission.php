<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    // Configure the model
    protected $table = 'role_permission';
    public $primary_key = 'uuid';
}
