<?php
namespace app\ycont\controller;

use app\common\model\Attach;
use app\common\model\MemberLog;
use app\common\model\ParseUrl;
use app\common\model\WebSite;
use app\common\model\WebSiteCookie;
use think\Controller;
use think\Db;

class Jiexip extends Controller
{

    protected function initialize()
    {
        global $_G;
        $this->view->site_list = WebSite::where('status', '>', 0)->select();
    }

    public function parse($link = '', $debug = '', $verify = '')
    {
       global $_G;

        if (empty($link)) {
            die(json_encode(array("code"=>"0","msg"=>'你没有输入链接',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if (empty($_G['member'])) {
            die(json_encode(array("code"=>"0","msg"=>'请先登陆后再使用此功能',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户已过期，请联系管理员！',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['parse_max_times'] < 0) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户没有解析权限',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['parse_max_times'] > 0 && $_G['member']['parse_times'] >= $_G['member']['parse_max_times']) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户解析次数已达上限，请充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['setting']['parse_between_time'] > 0 && $last = MemberLog::where([['uid', '=', $_G['member']['uid']], ['status', '=', 1], ['create_time', '>=', $this->request->time() - $_G['setting']['parse_between_time']]])->find()) {
            $between_time = $_G['setting']['parse_between_time'] - ($this->request->time() - strtotime($last['create_time']));
            die(json_encode(array("code"=>"0","msg"=>'操作太频繁啦，请' . $between_time . '秒再试！',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        //获取网盘的id
        $site = '';
        foreach ($this->view->site_list as $data) {
            if (stripos($link, $data['url_regular']) !== false) {
                $site = $data;
                break;
            }
        }

        
        if (empty($site) || $site['status'] != 1) {

           die(json_encode(array("code"=>"0","msg"=>'暂不支持该网址的解析！',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        if (empty($_G['member']['site_access'][$site['site_id']])) {
            die(json_encode(array("code"=>"0","msg"=>'您没有该网站的解析权限，请联系管理员或充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        $access = $_G['member']['site_access'][$site['site_id']];
        if ($access['day'] < 0 || $access['all'] < 0) {
            die(json_encode(array("code"=>"0","msg"=>'您没有该网站的解析权限，请联系管理员或充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($access['day'] > 0 && $access['day_used'] >= $access['day']) {
            die(json_encode(array("code"=>"0","msg"=>'目标网站今日的解析次数已用完，试试其他网站吧',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($access['all'] > 0 && $access['max_used'] >= $access['all']) {
            die(json_encode(array("code"=>"0","msg"=>'目标站解析次数已达上限，请联系客服充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        //获取归属的cookie
        $action   = 'get_' . str_replace('.', '_', $site['url_regular']);
        $ParseUrl = new ParseUrl($link, $site);
        $cookie   = $ParseUrl->cookie;
       
        if (empty($cookie) || !method_exists($ParseUrl, $action)) {

            die(json_encode(array("code"=>"0","msg"=>'暂不支持该网址的解析！亲请联系下管理',"data"=>'',"url"=>'',"wait"=>3,)));
        }


        if (config('app.app_debug') == true) {
            die(json_encode(array("code"=>"1","msg"=>'验证成功',"data"=>'',"url"=>'',"wait"=>3,)));
        } else {
            try {
               // $result = $ParseUrl->$action($verify);
            } catch (\Exception $e) {
                die(json_encode(array("code"=>"0","msg"=>'解析失败，错误码：500',"data"=>'',"url"=>'',"wait"=>3,)));
            }
        }
  
        die(json_encode(array("code"=>"1","msg"=>'验证成功!',"data"=>'',"url"=>'',"wait"=>3,)));
        //return $this->success('解析成功！', '', $result['msg']);
    }
  
  
  	    public function zffjosn($link = '', $debug = '', $verify = '')
    {
       global $_G;

        if (empty($link)) {
            die(json_encode(array("code"=>"0","msg"=>'你没有输入链接',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if (empty($_G['member'])) {
            die(json_encode(array("code"=>"0","msg"=>'请先登陆后再使用此功能',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户已过期，请联系管理员！',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['parse_max_times'] < 0) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户没有解析权限',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['member']['parse_max_times'] > 0 && $_G['member']['parse_times'] >= $_G['member']['parse_max_times']) {
            die(json_encode(array("code"=>"0","msg"=>'您的账户解析次数已达上限，请充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($_G['setting']['parse_between_time'] > 0 && $last = MemberLog::where([['uid', '=', $_G['member']['uid']], ['status', '=', 1], ['create_time', '>=', $this->request->time() - $_G['setting']['parse_between_time']]])->find()) {
            $between_time = $_G['setting']['parse_between_time'] - ($this->request->time() - strtotime($last['create_time']));
            die(json_encode(array("code"=>"0","msg"=>'操作太频繁啦，请' . $between_time . '秒再试！',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        //获取网盘的id
        $site = '';
        foreach ($this->view->site_list as $data) {
            if (stripos($link, $data['url_regular']) !== false) {
                $site = $data;
                break;
            }
        }

        
        if (empty($site) || $site['status'] != 1) {

           die(json_encode(array("code"=>"0","msg"=>'暂不支持该网址的解析！',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        if (empty($_G['member']['site_access'][$site['site_id']])) {
            die(json_encode(array("code"=>"0","msg"=>'您没有该网站的解析权限，请联系管理员或充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        $access = $_G['member']['site_access'][$site['site_id']];
        if ($access['day'] < 0 || $access['all'] < 0) {
            die(json_encode(array("code"=>"0","msg"=>'您没有该网站的解析权限，请联系管理员或充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($access['day'] > 0 && $access['day_used'] >= $access['day']) {
            die(json_encode(array("code"=>"0","msg"=>'目标网站今日的解析次数已用完，试试其他网站吧',"data"=>'',"url"=>'',"wait"=>3,)));
        }
        if ($access['all'] > 0 && $access['max_used'] >= $access['all']) {
            die(json_encode(array("code"=>"0","msg"=>'目标站解析次数已达上限，请联系客服充值',"data"=>'',"url"=>'',"wait"=>3,)));
        }

        //获取归属的cookie
        $action   = 'get_' . str_replace('.', '_', $site['url_regular']);
        $ParseUrl = new ParseUrl($link, $site);
        $cookie   = $ParseUrl->cookie;
       
        if (empty($cookie) || !method_exists($ParseUrl, $action)) {

            die(json_encode(array("code"=>"0","msg"=>'暂不支持该网址的解析！亲请联系下管理',"data"=>'',"url"=>'',"wait"=>3,)));
        }


        if (config('app.app_debug') == true) {
            die(json_encode(array("code"=>"1","msg"=>'验证成功',"data"=>'',"url"=>'',"wait"=>3,)));
        } else {
            try {
                $result = $ParseUrl->$action($verify);
            } catch (\Exception $e) {
                die(json_encode(array("code"=>"0","msg"=>'解析失败，错误码：500',"data"=>'',"url"=>'',"wait"=>3,)));
            }
        }
        die(json_encode(array("code"=>"1","msg"=>$result['msg'],"data"=>'',"url"=>'',"wait"=>3,)));
        //return $this->success('解析成功！', '', $result['msg']);
    }

    //通过连接获取相关的cookie
    public function yicookie($link = '')
    {
               //获取网盘的id
        $site = '';
    
        foreach ($this->view->site_list as $data) {
            if (stripos($link, $data['url_regular']) !== false) {
                $site = $data;
                break;
            }
        }
      
        if ($site == false) {

          die(json_encode(array("code"=>"0","msg"=>'输入地址错误无法识别，请重新输入或者换个试试')));
        }
        //获取归属的cookie
        $ParseUrl = new ParseUrl($link, $site);
        $cookie   = $ParseUrl->cookie;
        //判断cookie是否开启
        if ($cookie == false) {
          die(json_encode(array("code"=>"0","msg"=>'暂时失效，请联系管理员更新')));
        }

        //定义cookie.
        $cookie_content = $cookie['content'];


        //判断是否以json输出
        if ($cookie['json_status']==1) {
            //把cookie变成数组成为json状态
                $str = $cookie['content'];
                $arr = explode('&&',$str);
                $arr2 = array();
                foreach($arr as $k=>$v){
                        $arr = explode('==',$v);
                        $arr2[$arr[0]] = $arr[1];
                }
                $cookie_content=$arr2;
        }

        if ($cookie['dl_ip'] == '') {
          die (json_encode(array("code"=>"1","msg"=>$cookie_content,"dl_ip"=>$_SERVER['REMOTE_ADDR'])));
        }
      die(json_encode(array("code"=>"1","msg"=>$cookie_content,"dl_ip"=>$cookie['dl_ip'])));        
    }

    //累计次数增加
    public function yizcont($link = ''){
        global $_G;
        //获取网盘的id
        $site = '';
        foreach ($this->view->site_list as $data) {
            if (stripos($link, $data['url_regular']) !== false) {
                $site = $data;
                break;
            }
        }
        if ($site == false) {
          die(json_encode(array("code"=>"0","msg"=>'输入地址错误无法识别，请重新输入或者换个试试')));
        }
        $access = $_G['member']['site_access'][$site['site_id']];
        //获取归属的cookie
        $ParseUrl = new ParseUrl($link, $site);
        $cookie   = $ParseUrl->cookie;
        //解析成功后次数+1
        MemberLog::create([
            'uid'       => $_G['member']['uid'],
            'site_id'   => $site['site_id'],
            'times'     => 1,
            'status'    => 1,
            'parse_url' => $link,
        ]);
        $access['day_used'] = $access['day_used'] + 1;
        $access['max_used'] = $access['max_used'] + 1;
        $site_access        = $_G['member']->site_access;

        $site_access[$site['site_id']] = $access;
        $_G['member']->site_access     = $site_access;
        $_G['member']->parse_times     = $_G['member']->parse_times + 1;
        $_G['member']->save();

        //此cookie使用的次数+1
        WebSiteCookie::where('cookie_id', '=', $cookie['cookie_id'])->update(['used_times' => Db::raw('used_times+1')]);

        die(json_encode(array("code"=>"1","msg"=>'累计增加成功')));

    }


   
}
