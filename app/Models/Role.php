<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Configure the model
    protected $table = 'role';
    public $primary_key = 'uuid';

    // Define relationships here
    public function role_permission() {
      // Each role belongs to one role_permission record of it's table
      $this -> belongsTo('role_permission')
    }
}
