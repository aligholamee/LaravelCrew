<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_House extends Model
{
    // Configure the model
    protected $table = 'user_house';
    public $primary_key = 'uuid';

    // Define relationships here
    public function user() {
      $this -> hasOne('user');
    }

    public function house() {
      $this -> hasOne('house');
    }
}
