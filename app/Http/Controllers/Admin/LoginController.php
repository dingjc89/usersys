<?php
/**
 * 登录
 * @author steve dingjc89@gmai.com
 * [2017-04-11]
 * @copyright steve
 * @version v1.0
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Base\BaseController;

class LoginController extends BaseController
{
    /**
     * 进入登录界面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        return view('admin.login.login');
    }
    /**
     * 登录
     * @param Request $request
     */
    public function login(Request $request)
    {

    }

    /**
     * 登出
     */
    public function logout()
    {
        ee(11);
    }
}
