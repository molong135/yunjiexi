<?php 
namespace app\common\model;


class XinhttpCurl
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


    //抓取真实id
    public function  getId(){
        $content = $this->listRequest($this->request_url);   //传入第一次解析真实id
        $content_arr=@explode('onclick="save_as(',$content);
        $content_arr=@explode(')"><span style',$content_arr[1]);
        $id = @$content_arr[0];
        return $id;
    }

    //获取解析第一次id地址得到ajax地址返回的是真实id
    public function listRequest(){
        $content=$this->get_data($this->request_url);
        if (!$content){
            $content=$this->listRequest($this->request_url);
        }
        return $content;
    }

    //通过url获取真实id
    public function get_data(){
          //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $this->request_url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->request_headers);
        curl_setopt($curl,CURLOPT_HEADER,true);
        
        curl_setopt($curl,CURLOPT_COOKIE,trim($this->request_cookie));
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }

    //通过真实id找到下载地址
    function post_content($url,$id){
        
        $cookie_file= $this->request_cookie;//cookie

        $ch =curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        $post_data=[
            'action'=>'load_down_addr_vip',
            'file_id'=>$id
        ];
        $header=$this->request_headers;//头部文件

        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_COOKIE,trim($cookie_file));
        $content = curl_exec($ch);
        return $content;
    }

   
    function qqfielyanz(){
        
         //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $this->request_url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->request_headers);
        curl_setopt($curl,CURLOPT_HEADER,true);
        
        curl_setopt($curl,CURLOPT_COOKIE,trim($this->request_cookie));
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }

    /*
    *单独dufile云盘 和风云云盘
    */
    function dufile_id(){
        $url= $this->request_url;//url
        $cookie_file= $this->request_cookie;//cookie
        $headers=$this->request_headers;//头部文件
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL,$url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。  
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($curl,CURLOPT_HEADER,true);
        
        curl_setopt($curl,CURLOPT_COOKIE,$cookie_file);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }
  
   //迅雷下载地址
    function Thunder($url, $type='en') {
        if($type =='en'){
            return "thunder://".base64_encode("AA".$url."ZZ");
            }else{
            return substr(base64_decode(substr(trim($url),10)),2,-2);
        }
    }

        //获取id值和文件属性
  function huoqufile($ourl,$header,$cookie){
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL,$ourl);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。  
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl,CURLOPT_HEADER,true);
        
        curl_setopt($curl,CURLOPT_COOKIE,$cookie);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);

        return $data;
}
//文本取中间
      function get_between($input, $start, $end) {
        $substr = substr($input, strlen($start)+strpos($input, $start),(strlen($input) - strpos($input, $end))*(-1));

        return $substr;

      }
    
   
}




 ?>