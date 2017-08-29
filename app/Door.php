<?php

namespace App;
use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Door extends Model
{
    // Optimized uuid
    private static $uuidOptimization = true;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    use UuidModelTrait;
    use CrudTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'door';

    /**
     * The primary key for the model.
     *
     * @var string
     */
     protected $primaryKey = 'uuid';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    // public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
     //protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name', 'comment','house_uuid', 'user_uuid'];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
     // protected $hidden = ['house_uuid'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
  
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function house() {
      return $this->belongsTo('House');
    }

    public function user_door() {
      return $this->belongsTo('user_door');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
