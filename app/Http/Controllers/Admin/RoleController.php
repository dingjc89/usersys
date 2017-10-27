<?php
/**
 * 角色
 * @author steve dingjc89@gmai.com
 * [2017-08-03]
 * @copyright steve
 * @version v1.0
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\Base\BaseController;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\UserRepository;
use DB;

class RoleController extends BaseController
{
    /**
     * 列表
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $roleRep = new RoleRepository();
        $data = $roleRep->getList();
        return view('admin.role.index',['data'=>$data]);
    }

    /**
     * 添加
     * @return \Illuminate\View\View
     */
    public function add($id = null)
    {
        // 根节点
        $roleNode = array(
            'pid'=>0,
            'path'=>','
        );
        if ($id){
            $roleRep = new RoleRepository();
            $role = $roleRep->getRow($id);
            $roleNode = array(
                'pid'=>$role->role_id,
                'path'=>($role->path.$role->role_id.',')
            );
        }

        // 权限
        $permissionData = $this->getPermissions();
        $permissionRep = new PermissionRepository();
        $permissionData = $permissionRep->formatPermissions($permissionData->toArray());
        // 用户
        $userData = $this->getUsers();
        // 表
        $table = array('user'=>'用户','role'=>'角色');
        $data = array('users'=>$userData,'permissions'=>$permissionData,'table'=>$table,'roleNode'=>$roleNode);
        return view('admin.role.add',$data);
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $input = $request->except('_token');
        $roleRep = new RoleRepository();
        $result = $roleRep->store($input);
        if ($result) {
            return $this->formatData(array('status'=>'succ','data'=>'保存成功'));
        }
        return $this->formatData(array('status'=>'fail','data'=>'保存失败'));
    }

    /**
     * 权限
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public  function getPermissions()
    {
        $permissionRep = new PermissionRepository();
        return $permissionRep->getAll();
    }

    /**
     * 用户
     * @return \Illuminate\Database\Eloquent\Collection|
     */
    public function getUsers()
    {
        $userRep = new UserRepository();
        return $userRep->getAll();
    }

    /**
     * 删除角色
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function del(Request $request)
    {
        $id = $request->input('id');
        $roleRep = new RoleRepository();
        if ($roleRep->del($id)) {
            return $this->formatData(array('status'=>'succ','data'=>'删除成功'));
        }
        return $this->formatData(array('status'=>'fail','data'=>'删除失败'));
    }

    /**
     * 编辑角色
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $roleRep = new RoleRepository();
        $role = $roleRep->getRoleById($id);
        $roleUsers = $roleRep->getUserByRoleObj($role);
        $rolePermissions = $roleRep->getPermissionsByRoleObj($role);
        $users = $this->getUsers();
        // 权限
        $permissionData = $this->getPermissions();
        $permissionRep = new PermissionRepository();
        $permissionData = $permissionRep->formatPermissions($permissionData->toArray());
        // 表
        $table = array('user'=>'用户','role'=>'角色');
        $data = ['role'=>$role,
                 'roleUsers'=>$roleUsers,
                 'rolePermissions'=>$rolePermissions,
                 'users'=>$users,
                 'table'=>$table,
                 'permissions'=>$permissionData];
        return view('admin.role.edit',$data);
    }

    /**
     * 更新角色
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $roleRep = new RoleRepository();
        $result = $roleRep->update($input, $id);
        if ($result){
            return $this->formatData(array('status'=>'succ','data'=>'更新成功'));
        } else {
            return $this->formatData(array('status'=>'fail','data'=>'更新失败'));
        }

    }
}
