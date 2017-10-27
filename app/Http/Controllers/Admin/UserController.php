<?php
/**
 * 用户
 * @author steve dingjc89@gmai.com
 * [2017-04-17]
 * @copyright steve
 * @version v1.0
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\Base\BaseController;
use App\Repositories\UserRepository;
use App\Libraries\Xml\Base;

class UserController extends BaseController
{
    public function index(Request $request)
    {
        $userRep = new UserRepository();
        $data = $userRep->getList();

        return view('admin.user.index',['data'=>$data]);
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $userRep = new UserRepository();
        $result = $userRep->store($request->except(['_token', 'confirmPassword']));
        return $result;
    }

    public function edit($id)
    {
        $userRep = new UserRepository();
        $user = $userRep->getRow($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');
        $userRep = new UserRepository();
        $result = $userRep->del($id);
        return $result;
    }
}
