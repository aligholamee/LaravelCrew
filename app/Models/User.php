<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Configure the model
    protected $table = 'user';
    public $primary_key = 'uuid';
}