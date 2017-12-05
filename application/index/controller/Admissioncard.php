<?php
/**
 * Created by PhpStorm.
 * User: xl
 * Date: 17-11-10
 * Time: 上午9:31
 */

namespace app\index\controller;
use think\Controller;


class Admissioncard extends Controller
{
    private $obj;

    public function _initialize()
    {
        $this->obj = model('Admissioncard');
    }

    public function index()
    {
        return $this->fetch();
    }

    public function input()
    {
        return $this->fetch();
    }

    /**
     * 无记录增加  有记录保存
     */
    public function save()
    {
        if(!request()->isPost())
        {
            $this->error('请求失败');
        }
        $data = request()->post();


        $data['status']=1;

        if(!empty($this->obj->getInfoByNumber($data['number'])))
        {
            return $this->obj->update($data);
        }
        $res = $this->obj->add($data);
        if($res)
        {
            $this->success('新增成功!');
        }else
        {
            $this->error('新增失败！');
        }
    }

    public function query(){
        return $this->fetch();
    }

    public function queryresult(){
        if(!request()->isPost())
        {
            $this->error('请求失败');
        }
        $data = request()->post();

        $result = $this->obj->getInfoByNumber($data['number']);

        if(empty($result))
        {
            $this->error('无记录');

        }else{

            return $this->fetch('queryresult',[
                'result'=>$result
            ]);
        }

    }

    public function download(){
        //Loader::import('mpdf.mpdf',EXTEND_PATH);
        //include_once "../application/extra/mpdf/mpdf.php";
        //$mpdf = new \mPDF('zh-cn','A4', 0, '宋体', 0, 0);
        //$content = self::$cardText;
        //$data = request()->post();
        //return $content;

        //$content = "testsss";
        //$mpdf->WriteHTML($content);
        //$mpdf->Output('down.pdf','D');
    }


    public function test(){



    }

}