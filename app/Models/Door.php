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
      $this -> belongsTo('house');
    }

    public function user() {
      // This can be 1(Client) or many(Client + It's guests)
      $this -> belongsToMany('user');
    }

    public function user_door() {
      // In that table each user is assigned to one door respectively
      $this -> belongsTo('user_door');
    }
}
