<?php
/**
 * 角色--仓库
 * @author steve dingjc89@gmai.com
 * [2017-08-03]
 * @copyright steve
 * @version v1.0
 */
namespace App\Repositories;

use App\Models\Role;
use App\Models\UserRole;
use App\Models\RolePermission;
use App\Repositories\Base\BaseRepository;
use DB;

class RoleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->mod = new Role();
    }

    /**
     * 角色数据集
     * @param array $filter
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getList($filter = array())
    {
        $roles = $this->mod->with('users')->get();
        $rolesTree = $this->getMapTree($roles);
        return $rolesTree;
    }

    private function getMapTree($roles)
    {
        foreach($roles as $role){
            $data[$role->pid][] = $role;
        }
        $this->_map($role_cuttent,$data,0 );
        return $role_cuttent;
    }

    function _map( &$role_cuttent,$data,$key ){
        if(is_array($data[$key])){
            foreach( $data[$key] as $k => $v ){
                $role_cuttent[] = $v;
                if( isset($data[$v->role_id]) && $data[$v->role_id] )
                    $this->_map($role_cuttent,$data, $v->role_id);
            }
        }
    }

    /**
     * 保存
     * @param $input
     * @return bool
     */
    public function store($input, $roleMod = null)
    {
    	$roleName = $input['roleName'];
        $userIds = $input['userName'];
        $permissions = $input['permissions'];
        $pid = $input['pid'];
        $path = $input['path'];
        DB::beginTransaction();
        $roleMod = $this->storeRole($roleName,$pid,$path,$roleMod);
        if($roleMod){
        	$result = $this->storeUserRole($roleMod,$userIds) && $this->storeRolePermission($roleMod,$permissions);
        	$result ? DB::commit() : DB::rollBack();
        }
        return $result;
    }

    /**
     * 角色保存
     * @param $roleName
     * @param int $pid
     * @param string $path
     * @return int
     */
    private function storeRole($roleName,$pid = 0,$path = '', $roleMod)
    {
        if (!$roleMod) {
            $roleMod = $this->mod;
        }

        $roleMod->name = $roleName;
        $roleMod->pid = $pid;
        $roleMod->path = $path;
    	if ($roleMod->save()) {
            return $roleMod;
        } else {
    	    return 0;
        }
    }

    /**
     * 用户角色关联--保存
     * @param $roleMod
     * @param $userIds
     * @return bool
     */
    private function storeUserRole($roleMod,$userIds)
    {
        $roleMod->users()->attach($userIds);
    	return true;
    }

    /**
     * 角色权限--保存
     * @param $roleMod
     * @param $permissions
     * @return bool
     */
    private function storeRolePermission($roleMod,$permissions)
    {
        $roleMod->permissions()->attach($permissions);
    	return true;
    }

    /**
     * 删除
     * @param $role_id
     * @return bool
     */
    public function del($role_id)
    {
        DB::beginTransaction();
        $roleMod = $this->getRow($role_id);
        if($this->delRole($roleMod) && $this->delUserRole($roleMod) && $this->delRolePermission($roleMod)) {
            DB::commit();
            return true;
        }
        DB::rollBack();
        return false;
    }

    /**
     * 角色--删除
     * @param $roleMod
     * @return bool
     */
    private function delRole($roleMod)
    {
        return $roleMod->delete();
    }

    /**
     * 用户角色关联--删除
     * @param $roleMod
     * @return bool
     */
    private function delUserRole($roleMod)
    {
        return $roleMod->users()->detach();
    }

    /**
     * 角色权限关联--删除
     * @param $roleMod
     * @return bool
     */
    private function delRolePermission($roleMod)
    {
        return $roleMod->permissions()->detach();
    }

    /**
     * 获取角色
     * @param $id
     * @return mixed
     */
    public function getRoleById($id)
    {
        $role = $this->getRow($id);
        return $role;
    }

    /**
     * 获取角色对应用户
     * @param $roleMod
     * @return mixed
     */
    public function getUserByRoleObj($roleMod)
    {
        return $roleMod->users;
    }

    /**
     * 获取角色对应权限
     * @param $roleMod
     * @return mixed
     */
    public function getPermissionsByRoleObj($roleMod)
    {
        return $roleMod->permissions;
    }

    public function update($input ,$id)
    {
        $result = false;
        DB::beginTransaction();
        $roleMod = $this->getRow($id);
        if ($this->delUserRole($roleMod) && $this->delRolePermission($roleMod)) {
            if($result = $this->store($input,$roleMod)){
                DB::commit();
            }
        }
        DB::rollBack();
        return $result;
    }
}