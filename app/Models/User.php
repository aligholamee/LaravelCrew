<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Configure the model
    protected $table = 'door';
    public $primary_key = 'uuid';
}
