<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    // Configure the model
    protected $table = 'house';
    public $primary_key = 'uuid';

    // Define the relationships
    public function user() {
      $this -> belongsTo('user');
    }

    public function door() {
      $this -> hasMany('door');
    }

    public function user_house() {
      $this -> belongsTo('user_house');
    }
}
