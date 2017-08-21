<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    // Configure the model
    protected $table = 'door';
    public $primary_key = 'uuid';
}
