<?php

namespace app\common\model;



use app\common\model\Attach;

use app\common\model\HttpCurl;

use app\common\model\XinhttpCurl;

use app\common\model\WebSiteCookie;

use think\facade\Debug;

use think\facade\Request;

use think\facade\Env;



class ParseUrl

{

    private $link;

    private $site;

    public $cookie;



    public function __construct($link, $site)

    {

        $this->link   = $link;

        $this->site   = $site;

        $this->cookie = $this->get_cookie();

    }



    private function get_cookie($out_id = [])

    {

        $map = [

            ['site_id', '=', $this->site['site_id']],

            ['status', '=', 1],

        ];

        if (!empty($out_id)) {

            $map[] = ['cookie_id', 'not in', $out_id];

        }

        $cookie = WebSiteCookie::where($map)->find();

        if (empty($cookie)) {

            return false;

        }

        if ($cookie['times'] > 0 && $cookie['used_times'] >= $cookie['times']) {

            $out_id[] = $cookie['cookie_id'];

            return $this->get_cookie($out_id);

        }

        return $cookie;

    }



    private function get_cache($site_code = '', $site_code_type = '')

    {

        $query = Attach::where('site_id', $this->site['site_id'])->where('site_code_type', $site_code_type)->where('site_code', $site_code)->where('status', '>', 1)->select();

        if (!$query->isEmpty()) {

            $download = [];

            foreach ($query as $attach) {

                $download[$attach['button_name']] = url('index/download/index', ['attach_id' => $attach['attach_id']]);

            }

            if (!empty($download)) {

                return ['code' => 1, 'has_attach' => 1, 'msg' => $download];

            }

        }

        return false;

    }



    //斯柯云盘
    public function get_skeyun_com()
    {
       
       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
       
        if ($cache !== false) {

            return $cache;

        }
       
           // 原来的url
            $url = $this->link;
            // 数据库的cookie
            $cookie = $this->cookie['content'];
            // 数据库的ip
            $ip = $this->cookie['dl_ip'];
            //头部信息文件
            $headers = [

                'Host: www.skeyun.com',
                'Origin: http://www.skeyun.com',
                'Referer:http://www.skeyun.com',
                'CLIENT-IP: '.$ip,
                'X-FORWARDED-FOR: '.$ip,

            ];

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->getId();//通过url找到真实id

       
        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，请联系管理员'];
        }

        $new_url = 'http://www.skeyun.com/ajax.php';
        $content_new = $xinwp->post_content($new_url,$id);//通过真实id找到下载地址
        //preg_match('/<a href="(.*?)" onclick="down_process2/',$content_new,$url);
         

        $woqu = explode( 'href="', $content_new);

        unset($woqu['0']);


        //2019年10月20日23:28:15因为会员也无法下载目前会员转免费通道
        //把https替换成http
        /*foreach ($woqu as  $value) {
            if(strpos($value,'http') !== false){
                $srcurl[] = 'http'.explode('http',$value)['1'];
            }
        }*/
        foreach ($woqu as  $value) {

            $vle[] = explode('" onclick="',$value)['0'];
        }

       //var_dump($vle); die(); 
        //迅雷通道
        $a_xunlei = $xinwp->Thunder($vle['0']);
        $b_xunlei = $xinwp->Thunder($vle['1']);
        $c_xunlei = $xinwp->Thunder($vle['2']);
        

        
        return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP电信下载' => $vle['0'],'VIP联通下载' => $vle['1'],'VIP移动下载' => $vle['2'],'电信迅雷下载' => $a_xunlei]];

        
    }
    //斯柯云盘end

    //至尊云盘
    public function get_95file_com()
    {
       
       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
       
        if ($cache !== false) {

            return $cache;

        }
       
           // 原来的url
            $url = $this->link;
            // 数据库的cookie
            $cookie = $this->cookie['content'];
            // 数据库的ip
            $ip = $this->cookie['dl_ip'];
            //头部信息文件
            $headers = [

                'Host: www.95file.com',
                'Origin: http://www.95file.com',
                'Referer:http://www.95file.com',
                'CLIENT-IP: '.$ip,
                'X-FORWARDED-FOR: '.$ip,

            ];

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->getId();//通过url找到真实id

        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，请联系管理员'];
        }

        $new_url = 'http://www.95file.com/ajax.php';
        $content_new = $xinwp->post_content($new_url,$id);//通过真实id找到下载地址
        //preg_match('/<a href="(.*?)" onclick="down_process2/',$content_new,$url);
        $woqu = explode( 'href="', $content_new);

        unset($woqu['0']);

        //2019年10月20日23:28:15因为会员也无法下载目前会员转免费通道
        //把https替换成http
       /* foreach ($woqu as  $value) {
            if(strpos($value,'https') !== false){
                $srcurl[] = 'http'.explode('https',$value)['1'];
            }
        }*/
        foreach ($woqu as  $value) {

            $vle[] = explode('" onclick="',$value)['0'];
        }

        //迅雷通道
        $xunlei = $xinwp->Thunder($vle['0']);
         //var_dump($xunlei);die();
        return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP主力下载' => $vle['0'],'VIP电信下载' => $vle['1'],'VIP联通下载' => $vle['2'],'迅雷下载' => $xunlei]];


        
    }
    //至尊云盘end

    //八九云盘
 public function get_89file_com()
    {
       
       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
       
        if ($cache !== false) {

            return $cache;

        }
       
           // 原来的url
            $url = $this->link;
            // 数据库的cookie
            $cookie = $this->cookie['content'];
            // 数据库的ip
            $ip = $this->cookie['dl_ip'];
            //头部信息文件
            $headers = [

                'Host: www.89file.com',
                'Origin: http://www.89file.com',
                'Referer: http://www.89file.com',
                'CLIENT-IP: '.$ip,
                'X-FORWARDED-FOR: '.$ip,

            ];

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->getId();//通过url找到真实id

        
        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，请联系管理员'];
        }

        $new_url = 'http://www.89file.com/ajax.php';
        $content_new = $xinwp->post_content($new_url,$id);//通过真实id找到下载地址
        //preg_match('/<a href="(.*?)" onclick="down_process2/',$content_new,$url);
        $woqu = explode( 'href="', $content_new);

        unset($woqu['0']);

       
        foreach ($woqu as  $value) {

            $vle[] = explode('" onclick="',$value)['0'];
        }
        

        
        return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP主力下载' => $vle['0'],'VIP电信下载' => $vle['1'],'VIP联通下载' => $vle['2']]];

        
    }
    //八九云盘end

    //dufile云盘
 public function get_dufile_com()
    {
       
       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

       

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
           // 原来的urlvip连接
        //http://dufile.com/vip/572794d1111ccb13.html

            $url = 'http://dufile.com/vip/'.$site_code['1'].'.html';
           
            // 数据库的cookie
            $cookie = $this->cookie['content'];
            // 数据库的ip
            $ip = $this->cookie['dl_ip'];
            //头部信息文件
            $headers = [

                'Host: dufile.com',
                'Origin: http://dufile.com',
                'Referer: http://dufile.com',
                'CLIENT-IP: '.$ip,
                'X-FORWARDED-FOR: '.$ip,

            ];

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->dufile_id();//通过url解析
        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，请联系管理员'];
        }

        //判断链接是否正常
        $content_arr=@explode('<font color="#FF0000">对不起，',$id);
        $content_arr=@explode('到您要访问的页面！</font>',$content_arr[1]);
        $content_new = @$content_arr[0];
        
        if($content_new == '没有找'){
            return ['code' => 0, 'msg' => 'DUFile云盘链接输入不对，请检查重新输入'];
        }

        //获取后匹配截断
        $content_arr=@explode('<input type="hidden" id="file_key"',$id);
        $content_arr=@explode('</a></td>',$content_arr[1]);
        $content_new = @$content_arr[0];

        $woqu = explode( 'href="', $content_new);

        unset($woqu['0']);//清除数组
       
        foreach ($woqu as  $value) {

            $vle[] = explode('" id="downs"',$value)['0'];
        }
        $vle[] =  explode('" target="_blank"',$vle['2']);
       
        $vle[]=$vle['3']['0'];//合并数组
        unset($vle['2']);
        unset($vle['3']);

        //成功解析
        return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['云加速下载通道②' => $vle['0'],'云加速下载通道③' => $vle['1'],'本地高速下载' => $vle['4']]];

        
    }
    //dufile云盘end

    //风云网盘
    public function get_76fengyun_com()
    {
       

 

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
           // 原来的urlvip连接
       

            $url = $this->link;
        
            // 数据库的cookie
            $cookie = $this->cookie['content'];
            // 数据库的ip
            $ip = $this->cookie['dl_ip'];
            //头部信息文件
            $headers = [

                'Host: www.76fengyun.com',
                'Origin: http://www.76fengyun.com',
                'Referer: http://www.76fengyun.com',
                'CLIENT-IP: '.$ip,
                'X-FORWARDED-FOR: '.$ip,

            ];

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->dufile_id();//通过url解析

        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，请联系管理员'];
        }

         //判断链接是否正常
        $content_arr=@explode(' align="absmiddle" border="0" />',$id);
        $content_arr=@explode('<br /><br /><br />',$content_arr[1]);
        $content_new = @$content_arr[0];
        
        if($content_new == '文件已经被删除'){
            return ['code' => 0, 'msg' => '风云网盘地址不对或者文件已经被删除，请检查重新输入'];
        }
       

        //获取后匹配截断
         //获取真实id
        $content_arr=@explode('<td id="vipdown" height="50" align="center" style="border: 1px solid #666;">',$id);
        $content_arr=@explode('</a></td>',$content_arr[1]);
        $id = @$content_arr[0];
        $woqu = explode( 'href="', $id);
        unset($woqu['0']);//清除数组
        foreach ($woqu as  $value) {
            
            $vle[] = explode('" style=" background-color:',$value)['0'];
        }
        //成功解析

        return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }
    //风云网盘end

    //77file网盘
    public function get_77file_com($code='')
    {
        
        if ($code == '') {
          return ['code' =>'qqhlyz', 'msg' =>'请点击验证码','verify' =>'' ];
        }


        //判断是否为正规下载地址
        $pd_url_f=strstr($this->link, '/file/');
        if ($pd_url_f == false) {
                $this->link='https://www.77file.com/file/'.explode('/down/',$this->link)['1'];
        }else{
                $this->link='https://www.77file.com/file/'.explode('/file/',$this->link)['1'];
        }
		 //return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];
        // 原来的urlvip连接
            $url = $this->link;
        
           // 数据库的ip
            //$ip = $this->cookie['dl_ip'];
            $ip = $_SERVER['REMOTE_ADDR'];//$_SERVER['SERVER_ADDR']
      		//var_dump($ip);die();
            // 数据库的cookie
            //cookie使用ip

            //所有的cookie
          $cookie  = $this->cookie['content'];

           
           // var_dump( $cookie);die();
            //头部信息文件
            $headers = [

                'Host: www.77file.com',
                'Origin: https://www.77file.com',
                'Referer: https://www.77file.com',
                'CLIENT-IP: 110.185.146.93',
                'X-FORWARDED-FOR: 110.185.146.93',

            ];

        //是否提交验证码
        if($code != '')
        {   

             //new 新的类文件方法
            $xinwp = new XinhttpCurl($url,$headers,$cookie);
            //通过原地址找到真实id
            $data = $xinwp->huoqufile($url,$headers,$cookie);//通过url解析
            
            $start = "document.location.href = '/jsa/getverify.php?";

            $end = "&ticket='+ res.ticket + '&randstr=' + res.randstr;";

            $csstrzhongj =  $xinwp->get_between($data, $start, $end);  // output:coderbolg
            //url=www.77file.com//file/AICndHrCllzSihkT428.html&id=600296&tip=110.185.145.23&tmd5=d41d8cd98f00b204e9800998ecf8427e
              //分割 取id值
              $str1 =@explode('&id=', $csstrzhongj);
              $str2 =@explode('&', $str1[1]);
              $z_id = $str2['0'];//取出文本中间id的值
              //分割 取ip值
              $str_tip1 =@explode('tip=', $csstrzhongj);
              $str_tip2 =@explode('&', $str_tip1['1']);  
              @$str_tip = $str_tip2['0'];

              //分割 取md5值
              
              $str_md5 =@explode('tmd5=', $csstrzhongj);

              @$z_tmd5 = $str_md5['1'];//取出文本中间id的值

            //获取资源的id号

    
            $str = 'url='.$url.'&id='.$z_id.'&tip='.$str_tip.'&tmd5='.$z_tmd5.'&ticket='.$code['ticket']. '&randstr='.$code['randstr'];
              
            $ourl = 'https://www.77file.com/jsa/getverify.php?'.$str; 

            $link_referer = 'https://www.77file.com/';

            //var_dump($headers);


            //处理yanzhedngma 
            $varcode = new VarfileCode();
            //$yazcode = $varcode ->qqvarhd($yaz_url,$referer,$str);
            $yazcode = $varcode ->curl_request($ourl,$cookie,$link_referer,$headers);
            
            //var_dump($yazcode);

            $this->get_77file_com();
    
        }
       
       //正则匹配提取id
 
//var_dump($this->link);die();
    

        //new 新的类文件方法
        $xinwp = new XinhttpCurl($url,$headers,$cookie);

        //通过原地址找到真实id
        $id = $xinwp->dufile_id();//通过url解析

      

        //是否有真实id
        if(!$id){
            return ['code' => 0, 'msg' => '解析失败，,请联系管理员'];
        }

        //判断是否文件正常
        $content_arr=@explode('border="0" /></noscript>',$id);
        $content_arr=@explode('<br /><br /><br />',$content_arr[1]);
        $iswj_erro = @$content_arr[0];
        if ($iswj_erro == '文件已经被删除') {
          return ['code' => 0, 'msg' => '文件已经被删除，或者你的链接错误，请检查是否输入错误'];
        }

         //判断验证码 需要重新输入验证码
        
        $content_arr=@explode('<a><button id="TencentCaptcha" data-appid="',$id);
        $content_arr=@explode('" data-cbfn="callback"><span id="TencentCaptcha2">',$content_arr[1]);
        $content_new = @$content_arr[0];

        if($content_new == '2071654847'){
            //获取资源的id号
                $zyid=@explode('<a href="javascript:;" onclick="save_as(\'',$id);
                $zyid=@explode('\');" class="down_btn">',$zyid[1]);
                $zyid_new = @$zyid[0];
               
            //提交腾讯滑轮的验证码
                 return ['code' =>'qqhlyz', 'msg' =>'请点击验证码','verify' =>'' ];

        }
       // var_dump($content_arr);
 
        //获取后匹配截断
         //获取真实id
       $content_arr=@explode('<table width="100%" border="0" cellspacing="0" cellpadding="0">',$id);
        $content_arr=@explode('</table>',$content_arr[1]);
        $one_yici = @$content_arr[0];
        //var_dump($one_yici);die();
        $woqu = explode( '<td id="vipdown" height="50" align="center" style="border: 1px solid #666;">', $one_yici);
        unset($woqu['0']);//清除数组
        //var_dump($woqu);die();
        foreach ($woqu as $value) {
           $http_url= explode('<a href="',$value)['1'];
           //因为8-8日网站升级http不支持只支持https
           /*
           if(strpos($http_url,'https') !== false){ 
                $href[] ='http'.explode('<a href="https',$value)['1'];
            }else{
            */

            $href[] =explode('<a href="',$value)['1'];
            
        }
        foreach ($href as  $value) {
            
            $vles[] = explode('" id="',$value)['0'];
        }
     
        
        //成功解析
        /*
        $vle['0'] = 国际高速下载
        $vle['1'] = 电信下载
        $vle['2'] = 联通下载
        $vle['3'] = 移动下载
        */
       //电信
       /*
            $sd_url['0']='http://status.77file.com/cu4.php?ip=122.226.180.164';
            //联通
            $sd_url['1']='http://status.77file.com/cu4.php?ip=60.18.151.28';
            //移动
            $sd_url['2']='http://status.77file.com/cu4.php?ip=223.111.161.82';

                foreach ($sd_url as $k => $var) {
                    $ch =curl_init();
                    curl_setopt($ch,CURLOPT_URL,$var);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $content = curl_exec($ch);
                    //获取真实id
                    
                    $content_arr=@explode('true|',$content);
                    $content_arr=@explode('|',$content_arr[1]);
                   //$id[$k] = @$content_arr[0];
                    //var_dump($id);
                    $link_url[] = @$content_arr[0];
                    
                }
*/
                //迅雷下载地址
                $xunlei = $xinwp->Thunder($vles['0']);

        return ['code' => 1, 'site_code_type' => '', 'site_code' => $this->link, 'msg' => ['国际高速下载' => $vles['0'],'电信下载' => $vles['1'],'联通下载' => $vles['2'],'移动下载' => $vles['3'],'迅雷高速下载' => $xunlei]];

        
    }
    //77file网盘end

    //讯牛Action 2019年10月25日18:41:35

    public function get_niu_com()
    {
       
    

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //讯牛云盘END

   //彩虹云Action 2019年10月25日18:41:35

    public function get_i0i5_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //彩虹云END
    //567盘Action 2019年10月25日18:41:35

    public function get_567pan_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //567盘END
 
    //520盘Action 2019年10月25日18:41:35

    public function get_53_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //520盘END
    //飞猫云盘Action 2019年10月25日18:41:35

    public function get_feimaoyun_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //飞猫云盘END
 
    //即可网盘Action 2019年10月26日21:23:30

    public function get_jkpan_cc()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //即可网盘END

    //乱斗网盘Action 2019年10月26日21:23:30

    public function get_66disk_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //乱斗网盘END

    //155网盘Action 2019年10月26日21:23:30

    public function get_155file_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //155网盘END   
    //3afileAction 2019年10月26日21:23:30

    public function get_3afile_com()
    {
       
  

       //正则匹配提取id
       preg_match('/\/(\w+).html/', $this->link, $site_code);

      

       //是否有id值
        if (empty($site_code['1'])) {

            return ['code' => 0, 'msg' => '解析失败，网址输入错误或不支持该站点解析'];

        }

        $cache = $this->get_cache($site_code['1']);
        
        if ($cache !== false) {

            return $cache;

        }
       
        return ['code' => 0, 'msg' => '目前不支持网页版的亲请下载软件版体验飞速下载'];


        //成功解析

        //return ['code' => 1, 'site_code_type' => '', 'site_code' => $site_code['1'], 'msg' => ['VIP下载服务器' => $vle['0'],'VIP备用下载服务器' => $vle['1']]];

        
    }

    //3afile网盘END 


}

