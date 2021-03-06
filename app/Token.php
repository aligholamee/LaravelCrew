<?php

namespace App;
use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Token extends Model
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
     protected $table = 'token';

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
    // protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
     protected $fillable = ['start_date', 'end_date', 'value', 'door_uuid', 'generator_uuid'];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    // protected $hidden = ['generator_uuid','value', 'door_uuid'];

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

    public function generator_user() {
        return $this->belongsTo('User');
    }

    public function door_uuid() {
      return $this->belongsTo('Door');
    }

    public function door_token() {
      return $this->belongsTo('door_token');
    }
    
    public function user() {
      return $this->belongsTo('user');
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
