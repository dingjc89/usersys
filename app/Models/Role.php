<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    public $primaryKey = 'role_id';

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permission', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role', 'role_id', 'user_id');
    }
}
