<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    // Configure the model
    protected $table = 'door';
    public $primary_key = 'uuid';

    // Define the relationships here
    public function house() {
      $this -> belongsToMany('house');
    }

    public function door() {
      $this -> belongsTo('user');
    }

    public function user_door() {
      $this -> belongsTo('user_door');
    }
}
