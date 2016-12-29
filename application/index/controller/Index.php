<?php
namespace app\index\controller;

use think\View;
use think\Db;
class Index
{
    //显示index
    public function index()
    {
        $view = new View();
        return $view->fetch();
    }

    public function save()
    {
        $data['staffnum']=$_POST['data'];
        $data['time']=time();
        if(Db::table('staffnum')->insert($data)){
            echo "签到成功";
        }else{
            echo "签到失败请重试";
        }
    }

    //简单的显示
    public function showData()
    {
        $data=Db::table('staffnum')->select();
        $view = new View();
        foreach ($data as $key=>$value){
            $data[$key]['time']=date("Y-m-d H:i",$data[$key]['time']);
        }
        $view->datas = $data;
        return $view->fetch();
    }
}
