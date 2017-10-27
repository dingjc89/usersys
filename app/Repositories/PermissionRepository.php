<?php
/**
 * 权限
 * @author steve dingjc89@gmai.com
 * [2017-04-11]
 * @copyright steve
 * @version v1.0
 */
namespace App\Repositories;

use App\Models\Permission;
use DB;

class PermissionRepository
{
    public function getAll()
    {
        $query = Permission::all();
        return $query;
    }

    public function formatPermissions($data)
    {
    	$permissions = array();
    	if (!empty($data)) {
    		foreach ($data as $key => $value) {
    			if (strstr($value['name'],'edit_')) {
    				$permissions[$value['table']]['edit']['detail'][]=$value;
    				continue;
    			} else if (strstr($value['name'],'view_')) {
    				$permissions[$value['table']]['view']['detail'][]=$value;
    				continue;
    			}
    			$permissions[$value['table']][$value['name']] = $value;
    		}
    	}
    	return $permissions;
    }

    /**
     * 是否有权限
     * @param $userId
     * @param $table
     * @param $permissionName
     * @return bool
     */
    public function isPermission($userId, $table, $permissionName)
    {
        $query = DB::table('permissions')->where('name',$permissionName)->where('table',$table);
        $query = $query->join('role_permission','permissions.permission_id','=','role_permission.permission_id');
        $query = $query->join('user_role','user_role.role_id','=','role_permission.role_id');
        $query = $query->where('user_role.user_id',$userId)->get();

        if($query){
            return true;
        }

        return false;
    }
}