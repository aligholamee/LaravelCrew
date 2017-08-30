<?php

namespace Backpack\PermissionManager\app\Models;
use Alsofronie\Uuid\UuidModelTrait;
use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    use CrudTrait;
    use UuidModelTrait;
       /**
     * The primary key for the model.
     *
     * @var string
     */
     protected $primaryKey = 'uuid';
     

    protected $fillable = ['name', 'updated_at', 'created_at'];
}
