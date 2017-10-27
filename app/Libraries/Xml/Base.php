<?php
namespace App\Libraries\Xml;

use App\Models\Permission;

class Base extends Content
{
    public $path;
    public $xml = 'permissions.xml';

    public function __construct()
    {
        $this->path = app_path().'/Http/Controllers/Admin/';
    }

    public function active($value)
    {
        if (isset($value['name'])) {
            if (isset($value['edit']) || isset($value['view'])) {
                if ($value['edit']) {
                    $name = 'edit_'.$value['name'];
                    $info = $this->save($name,$value['desc'],$value['table']);
                }

                if ($value['view']) {
                    $name = 'view_'.$value['name'];
                    $info = $this->save($name,$value['desc'],$value['table']);
                }
                return $info;
            } else {
                $name = $value['name'];
                return $this->save($name,$value['desc'],$value['table']);
            }
        }
    }

    private function save($name,$desc,$table)
    {
        $permissionMol = new Permission();
        $permissionMol->table = $table;
        $permissionMol->name = $name;
        $permissionMol->desc = $desc;
        $query = $permissionMol->where('name',$name)->where('table',$table);
        if ($query->get()->toArray()) {
            if ($query->update(['desc'=>$desc])) {
                return ['table'=>$table,'name'=>$name,'action'=>'update'];
            }
        }else if ($permissionMol->save()) {
            return ['table'=>$table,'name'=>$name,'action'=>'add'];
        }
    }
}