<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Door extends Model
{
    // Configure the model
    protected $table = 'user_door';
    public $primary_key = 'uuid';

    // Define relationships here
    public function user() {
      $this -> hasOne('user');
    }

    public function door() {
      $this -> hasOne('door');
    }
}
