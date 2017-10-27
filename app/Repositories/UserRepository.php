<?php
/**
 * 用户
 * @author steve dingjc89@gmai.com
 * [2017-04-17]
 * @copyright steve
 * @version v1.0
 */

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->mod = new User();
    }

    public function store($data)
    {
        $userMod = new User();
        if(isset($data['id'])) {
            $userMod = $userMod->find($data['id']);
            unset($data['id']);
        }
        foreach ($data as $field => $value) {
            $userMod->$field = $value;
        }
        if ($userMod->save()) {
            return ['status'=>'succ', 'data'=>'保存成功'];
        }
        return ['status'=>'fail', 'data'=>'保存失败'];
    }

    public function getList($filter = array())
    {
        $userMod = new User();
        return $userMod->paginate();
    }

    public function getAll()
    {
        $query = User::all();
        return $query;
    }
}