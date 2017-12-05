<?php
/**
 * Created by PhpStorm.
 * User: xl
 * Date: 17-11-10
 * Time: 上午8:59
 */
namespace app\index\model;
use think\Model;

class Admissioncard extends Model
{

    public function add($data)
    {
        $data['status'] = 1;
        //$data['create_time'] = time();
        return $this->save($data);
    }
    public function getNormalFirstCategory(){
        $data = [
            'status'=>1,
            'parent_id'=>0,
        ];
        $order = [
            'id' => 'desc',
        ];
        return $this->where($data)->order($order)->select();
    }

    public function getInfoById($id){
        $data = [
            'status'=>1,
            'id'=>$id,
        ];
        return $this->where($data)->select();
    }

    public function getInfoByNumber($number){
        $data = [
            'status'=>1,
            'number'=>$number,
        ];
        return $this->where($data)->find();
    }

}