<body>
<div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">
    {include file="common/nav"}
    <div class="weui-cells weui-cells_form" >
        <div class="weui-cell weui-cell_vcode jiexi_url">
            <div class="weui-cell__bd" >
                <input class="weui-input parse_url_string" type="tel"  placeholder="请输入解析地址">
            </div>
            <div class="weui-cell__ft">
                <button class="weui-vcode-btn post_parse" style="font-size: 14px;">解析</button>
            </div>
        </div>
    </div>
    <div class="downloadFile" style="">
        <div class="weui-flex prase_html"  >
           <!-- <a href="https://www.baidu.com" target="_blank" class="weui-flex__item"><div class="placeholder">vip电信下载</div></a>
            <a class="weui-flex__item"><div class="placeholder">vip移动下载</div></a>
            <a class="weui-flex__item"><div class="placeholder">vip联通下载</div></a>-->
        </div>
    </div>

<div id="TencentCaptcha" style="display: none;height:30px;line-height:30px;text-align:center"; data-appid="2071654847" data-cbfn="callback"><font style="padding:4px;border:1px solid red;font-size:22px;">请点击验证</font></div>

    <article class="weui-article">
        <h3>公告：</h3>
        <p>{$_G['setting']['mobile_cont']|raw}</p>
    </article>

     </div>
        {include file="common/tab"}
    </div>
    <div class="dialog"  style="opacity: 1" >
        <div class="weui-mask"></div>
        <div class="weui-dialog">
            <div class="weui-dialog__hd"><strong class="weui-dialog__title">请输入验证码</strong></div>
            <div class="weui-dialog__bd var_cx">
                
            </div>
            <div class="weui-dialog__ft">
                <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default">确认</a>
                <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary">取消</a>
            </div>
        </div>
    </div>
</div>
<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
<style>
    .suposer .placeholder{
        margin: 5px;
        padding: 0 10px;
        background-color: #f7f7f7;
        height: 2.3em;
        line-height: 2.3em;
        text-align: center;
        color: rgba(0,0,0,.3);
        width: 100%;
    }
    #verify_code{
        height: 25px;
        line-height: 25px;
        text-indent: 5px;
    }
</style>
<script>
    var _this
    var type=1
    var code = '';
    $('.dialog').hide();
    $('body').on('click','.post_parse',function () {

             _this= $(this)
            _this.attr('disabled',"true")
            $(this).html('<div style="color: red">解析中</div>')
            link=$('.parse_url_string').val();
            parse_link_url(link,code);

    }).on('click','.weui-dialog__btn_default',function () {
         code = $('#verify_code').val();
        link=$('.parse_url_string').val();
        $('.dialog').hide();
        parse_link_url(link,code);
    }).on('click','.weui-dialog__btn_primary',function () {
        $('.dialog').hide();
        _this.html('解析')
        _this.removeAttr("disabled")
    })
    function parse_link_url($link,code) {
        setTimeout(function () {
            var urllist = '';
            $('.prase_html').html(urllist)
            $.post("{:url('index/index/parse')}",{link:$link,verify:code},function (s) {
               
                $('#TencentCaptcha').hide();
                _this.removeAttr("disabled")
                if(s.code==1){
                    var urllist = '';
                    $.each(s.data,function(name,url){
                        urllist+='<a class="weui-flex__item "  href="'+url+'" target="_blank" ><div class="placeholder">'+name+'</div></a>'
                    })
                    $('.prase_html').html(urllist)
                }else if(s.code==-1){

                    $('.dialog').show();
                    $('.var_cx').html(s.data)
                    return  false
                }else if(s.code==-2){
                    urllist = '请点击下载验证后下载';
                    $('#TencentCaptcha').show();
                }
                _this.html('解析')
                alert(s.msg)
            return false
            },'json')
        },2000)
        return false
    }

    $('body').on('click','.zngue_parse_url',function () {
        url = $(this).attr('data-url');
        window.open(url)
    })
</script>
<script>
window.callback = function(res){
    console.log(res)
    urllist = '';
    $('#TencentCaptcha').hide();
      $('.weui-cell__ft').html('<div class="weui-vcode-btn post_parse" style="color: red">解析中</div>')
      $('.prase_html').html(urllist)
    var link=$('.parse_url_string').val();
    if(res.ret === 0){
        $.ajax({
        type : 'post',
        url : '{:url('index/index/parse')}',//你处理的url
        data:{link:link,verify:res},
        dataType : 'json',
        success:function(s){
            $('.weui-cell__ft').html('<button class="weui-vcode-btn post_parse" style="font-size: 14px;">解析</button>')
             var urllist = '';
            $.each(s.data,function(name,url){
                urllist+='<a class="weui-flex__item "  href="'+url+'" target="_blank" ><div class="placeholder">'+name+'</div></a>'
            })
            $('.prase_html').html(urllist)
            },
        error:function(){
        }
    });
    }
}
</script>






