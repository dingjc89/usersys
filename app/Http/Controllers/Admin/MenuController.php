<?php
/**
 * 栏目
 * @author steve dingjc89@126.com
 * @version V1.0
 * @copyright steve
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index');
    }

    public function add()
    {
        return view('admin.menu.add');
    }

    public function store(Request $request)
    {

    }
}
