<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    // Configure the model
    protected $table = 'role_permission';
    public $primary_key = 'uuid';

    // Define the relationships
    public function permission() {
      // Each row of the role_permission table has one permission
      $this -> hasOne('permission');
    }

    public function role() {
      // Each row of the role_permission table has one role
      $this -> hasOne('role');
    }
}
