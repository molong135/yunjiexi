<?php


namespace app\wap\controller;


use app\common\model\MemberLog;
use think\Controller;
use think\db\Where;
use think\response\Json;

class Index extends Controller
{

    public function  index(){

        global $_G;

        return $this->fetch();
    }
    public function login(){

       
        return $this->fetch();
    }
    public function logout(){
        global $_G;
        if($_G['member']){
            $_G['member']->logout();
            return $this->success('退出成功');
        }else{
            return $this->error('退出失败');
        }
    }
    public function register(){

        return $this->fetch();
    }
    public function parse_list(){

        return $this->fetch();
    }
    public function parseListJson(){
        global $_G;
        $page = input('page',1);
        $uid=$_G['uid'];
        $data=[];
        if($uid){
            $data =MemberLog::order('log_id','desc')->field('a.*,b.title')->where('uid',$uid)->alias('a')->limit(10)->join('web_site b','a.site_id=b.site_id')->page($page)->select();
        }

        return return_json($data);
    }
    public function user(){

        return $this->fetch();
    }
    public function recharge(){

        return $this->fetch();
    }
    public function password(){

        return $this->fetch();
    }

    public function chanping()
    {
        return $this->fetch();
    }
}