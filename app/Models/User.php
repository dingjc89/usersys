<?php
/**
 * 用户
 * @author steve dingjc89@gmai.com
 * [2017-04-17]
 * @copyright steve
 * @version v1.0
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base\BaseModel;

class User extends BaseModel
{
    use SoftDeletes;

    protected $table = 'users';

    public $primaryKey = 'user_id';

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }
}
