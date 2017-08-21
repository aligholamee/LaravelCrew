<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Configure the model
    protected $table = 'user';
    public $primary_key = 'uuid';

    // Define relationships here
    public function house() {
      $this -> belongsTo('house');
    }

    public function user_house() {
      $this -> BelongsTo('user_house');
    }

    public function user_door() {
      $this -> BelongsTo('user_house');
    }

    public function role_permission() {
      $this -> hasOne('role_permission');
    }

    public function token1() {
      $this -> belongsTo('token');
    }

    public function token2() {
      $this -> belongsTo('token');
    }


}
