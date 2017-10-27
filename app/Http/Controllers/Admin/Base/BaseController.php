<?php

namespace App\Http\Controllers\Admin\Base;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * @param $data
     * @param string $format
     * @return \Illuminate\Http\Response
     */
    protected function formatData($data, $format = 'json')
    {
        switch ($format) {
            case 'json':
                return response()->json($data);
            default:
                throw new Exception('this is a error format');
        }
    }

}
