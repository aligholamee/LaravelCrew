<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    // Configure the model
    protected $table = 'door';
    public $primary_key = 'uuid';

    // Relationships
    /* public function house() {
      $this->belongsTo('house')
    } */
}
