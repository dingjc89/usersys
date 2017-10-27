<?php
/**
 * 角色权限--模型
 * @author steve dingjc89@gmai.com
 * [2017-08-03]
 * @copyright steve
 * @version v1.0
 */
namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermission extends BaseModel
{
	public $table = 'role_permission';

	public $timestamps = false;
}