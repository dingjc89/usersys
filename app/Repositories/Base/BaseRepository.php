<?php
/**
 * 仓库基类
 * @author steve dingjc89@gmai.com
 * [2017-04-18]
 * @copyright steve
 * @version v1.0
 */
namespace App\Repositories\Base;

class BaseRepository
{
    /**
     * @var 模型
     */
    protected $mod;

    /**
     * get a row data
     * @param $id
     * @return mixed
     */
    public function getRow($id)
    {
        return $this->mod->find($id);
    }

    /**
     * delete data
     * @param $id
     * @return array
     */
    public function del($id)
    {
        if ($this->mod->find($id)->delete()) {
            return ['status'=>'succ','data'=>'删除成功'];
        }
        return ['status'=>'fail','data'=>'删除失败'];
    }
}