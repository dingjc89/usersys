<?php
/**
 * 用户角色--模型
 * @author steve dingjc89@gmai.com
 * [2017-08-03]
 * @copyright steve
 * @version v1.0
 */
namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends BaseModel
{
	public $table = 'user_role';

	public $timestamps = false;
}