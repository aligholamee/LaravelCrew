<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    // Configure the model
    protected $table = 'token';
    public $primary_key = 'uuid';
}
