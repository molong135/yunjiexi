<?php 

namespace app\common\model;
use think\Model;
use think\facade\Env;

class VarfileCode extends Model
{
	public $request_url;
    public $request_headers;
    public $request_cookie;

    //全局变量
    public function __construct($url = '',$headers = [], $cookie = 0)
    {
        $this->request_url    = $url;
        $this->request_headers = $headers;
        $this->request_cookie = $cookie;
       
    }
    public function request_url($url = '')
    {
        $this->request_url = $url;
        return $this;
    }

    public function request_header($headers = [])
    {
        $this->request_headers = $headers;
        return $this;
    }

    public function request_cookie($cookie = 0)
    {
        $this->request_cookie = $cookie;
        return $this;
    }

   


function qqvarhd($url,$referer, $data) {
    
    $header=$this->request_headers;//头部文件

    $cookie= $this->request_cookie;//cookie

   //初使化init方法
   $ch = curl_init();

   //指定URL
   curl_setopt($ch, CURLOPT_URL, $url);

   //设定请求后返回结果
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   //声明使用POST方式来进行发送
   curl_setopt($ch, CURLOPT_POST, 1);

   //发送什么数据呢
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$header);


   //忽略header头信息
   curl_setopt($ch, CURLOPT_HEADER, 0);
  

   //设置超时时间
   curl_setopt($ch, CURLOPT_TIMEOUT, 10);
   curl_setopt ($ch, CURLOPT_REFERER, $referer);  
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
   curl_setopt($ch,CURLOPT_COOKIE,$cookie);


   //发送请求
   $output = curl_exec($ch);

   //关闭curl
   curl_close($ch);

   //返回数据
   return $output;
}
//2019年8月17日18:52:25new更新验证码77file
 function curl_request($url,$cookie='',$referer,$headers){

            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
            curl_setopt($curl, CURLOPT_REFERER,$referer);
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($curl,CURLOPT_HEADER,true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            @curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);  //ssl 这两行代码是为了能走https的请求,http请求放着也没有影响
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); //ssl 这两行代码是为了能走https的请求,http请求放着也没有影响
            $data = curl_exec($curl); 
            curl_close($curl);
      return $data;
    }

/***2019-7-31 17:59:02更新了新的验证码

    //https验证码用户自己输入
    function cofile_varfy($code){
        
        $cookie_file= $this->request_cookie;//cookie
        $header=$this->request_headers;//头部文件
        $ch =curl_init();
	    curl_setopt($ch,CURLOPT_URL,'https://www.77file.com/loginid.php?id=3');
	    $post=array(
	    "id" => "1",
	    "verycode" => $code,
	    );
	    curl_setopt($ch,CURLOPT_POST,true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    //curl_setopt($ch,CURLOPT_HEADER,true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	    curl_setopt($ch,CURLOPT_COOKIE,$cookie_file);
		$content = curl_exec($ch);
       // return $content;
    }

    function img_file($ip){

       //部信息
    $header = array(
    "Host:www.77file.com",
    "Origin:https://www.77file.com",
    "referer: https://www.77file.com",
    'CLIENT-IP: '.$ip,
    'X-FORWARDED-FOR: '.$ip,
        );
    //登录后的cookie
    $cookie = $this->request_cookie;


            $url = 'https://www.77file.com/includes/imgcode.inc.php?verycode_type=2';
 
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_COOKIE,$cookie);
        ob_start ();
        curl_exec ( $ch );
        $return_content = ob_get_contents ();
        ob_end_clean ();
         
        $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
      //  echo $return_content;
       
            $base_64 = base64_encode($return_content);
            $imgBase64Code = "data:image/jpeg;base64," . $base_64;
            //file_put_contents("/a.jpg",$return_content);
           // die();
            return $imgBase64Code;
    }

    ***/

}

 ?>