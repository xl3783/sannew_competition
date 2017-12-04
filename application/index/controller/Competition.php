<?php
namespace app\index\controller;

use app\common\model\Matchinfo;
use think\Controller;

class Competition extends Controller
{
    protected $obj;

    public function _initialize()
    {
        $this->obj = model('Matchinfo');
    }

    public function index()
    {
        $user = session('o2o_user','', 'o2o');
        $competitionList = Matchinfo::all();
        $competitionList = json_decode(json_encode($competitionList),true);
        $competitionApplied = $user->competitionId;
        $competitionApplied = explode(',',$competitionApplied);
        for($i = 0; $i < count($competitionList); ++$i){

            if(in_array((string)$competitionList[$i]['id'],$competitionApplied)){
                $competitionList[$i]['applied'] = true;
            }else{
                $competitionList[$i]['applied'] = false;
            }
        }
        return $this->fetch('',['competitionList'=>$competitionList]);
    }

}
