<?php


namespace app\ycont\controller;


use app\common\model\Member;
use app\common\model\VerifyCode;
use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;
use think\facade\Validate;

class Yuact extends Controller
{

    public function login(){

       global $_G;
        //var_dump($_G);die();
        if (!empty($_G['member'])) {
            $array=array("code"=>"0","msg"=>'您已登录，请关闭后再操作',"data"=>'',"url"=>'',"wait"=>3,);
            die(json_encode($array));
            //return $this->request->isPost() ? $this->success('您已登录，请退出后再操作', 'index/index/index') : $this->redirect('index/index/index');
        }
        if ($this->request->isPost()) {
            if (!$account = $this->request->post('account')) {
                    $array=array("code"=>"0","msg"=>'请输入帐户名',"data"=>'',"url"=>'',"wait"=>3,);
                    die(json_encode($array));
                }
            if (!$password = $this->request->post('password')) {
                $array=array("code"=>"0","msg"=>'请输入密码',"data"=>'',"url"=>'',"wait"=>3,);
                die(json_encode($array));
            }
            if (Validate::isEmail($account)) {
                $type = 'email';
            } else if (Validate::isMobile($account)) {
                $type = 'mobile';
            } else {
                $type = 'username';
            }
            if (!$member = Member::where($type, '=', $account)->find()) {
                $array=array(
                        "code"=>"0",
                        "msg"=>'账号不存在！',
                        "data"=>'',
                        "url"=>'',
                        "wait"=>3,
                    );
                    die(json_encode($array));
                
            }
            if ($member['status'] == -2) {
                $array=array(
                        "code"=>"0",
                        "msg"=>'用户已注销',
                        "data"=>'',
                        "url"=>'',
                        "wait"=>3,
                    );
                    die(json_encode($array));   
            }
            if ($member['status'] == -1) {
                $array=array("code"=>"0","msg"=>'用户已被禁用',"data"=>'',"url"=>'',"wait"=>3,);
                die(json_encode($array));

            }
            if (!password_verify(md5($password), $member['password'])) {
                $array=array("code"=>"0","msg"=>'密码错误！',"data"=>'',"url"=>'',"wait"=>3,);
                die(json_encode($array));

            }
            $update_data = [];
            if ($member['out_time'] > 0 && $member['out_time'] <= 315360000) {
                $update_data['out_time'] = $this->request->time() + $member['out_time'];

            }
            if ($member['password_see']) {
                $update_data['password_see'] = '';
            }
            if ($update_data) {
                foreach ($update_data as $key => $value) {
                    $member->$key = $value;
                }
                $member->save();
            }
            $member->login();
            $array=array("code"=>"1","msg"=>'登录成功！',"data"=>'',"url"=>'',"wait"=>-1,'name'=>$_G['member']['username'],'time'=>$_G['member']['out_time']);
            die(json_encode($array));

        }
    $array=array( "code"=>"0","msg"=>'错误请检查登录',"data"=>'',"url"=>'',"wait"=>3,);
    die(json_encode($array));
   
    }
    //易语言判断用户是否登录
    public function isyilogin(){
        global $_G;
       // echo "<pre>";
       //  print_r($_G);
       //  echo "</pre>";
       //  die();
        if (!empty($_G['member'])) {
            $array=array("code"=>"1","msg"=>'您已登录，请关闭后再操作',"data"=>'',"url"=>'','name'=>$_G['member']['username'],'time'=>$_G['member']['out_time']);
            die(json_encode($array));
        }else{
            $array=array("code"=>"-1","msg"=>'你还没用登录',"data"=>'',"url"=>'',"wait"=>3,);
            die(json_encode($array));
        }
    }
    //易语言判断用户时间
    public function isyitime(){

            $array=array("code"=>"1",'time'=>time());
            die(json_encode($array));
        
    }

    public function logout(){
        global $_G;
        if($_G['member']){
            $_G['member']->logout();
            die(json_encode(array("code"=>"1","msg"=>'退出成功',"data"=>'',"url"=>'',"wait"=>3,)));
            
        }else{
            die(json_encode(array("code"=>"0","msg"=>'退出失败',"data"=>'',"url"=>'',"wait"=>3,)));
            
        }
    }


}