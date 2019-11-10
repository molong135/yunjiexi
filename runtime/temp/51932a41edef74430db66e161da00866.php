<?php /*a:6:{s:71:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/index_index.php";i:1571645932;s:66:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/layout.php";i:1563250196;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_header.php";i:1571645700;s:70:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_nav.php";i:1571646090;s:70:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_tab.php";i:1563266420;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_footer.php";i:1571660765;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机版_<?php echo htmlentities($_G['setting']['site_name']); ?></title>
    <meta name="description" content="<?php echo htmlentities($_G['setting']['description']); ?>" />
    <meta name="keywords" content="<?php echo htmlentities($_G['setting']['keywords']); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
    <link rel="stylesheet" type="text/css" href="/static/css/weui.css">
    <link rel="stylesheet" type="text/css" href="/static/css/example.css">
    <link rel="stylesheet" type="text/css" href="/static/css/weui_more.css">
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/static/js/common.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?919aaf935eba5844ec1724e37f5c688b";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</head>
  

<div class="container">
    <?php if($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()): ?>
    <div class="alert alert-primary" role="alert">您的账户已过期，无法解析资源，请联系管理员增加时间或获取新账号！</div>
    <?php endif; ?>
    <body>
<div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">
    <div class="weui-flex nav">
    <div class="weui-flex__item" onclick="navLoad(this)" data-url="<?php echo url('wap/index/index'); ?>" ><div class="placeholder">首页</div></div>
    <div class="weui-flex__item" onclick="navLoad(this)" ><a href="<?php echo url('wap/index/chanping'); ?>"><div class="placeholder">实例</div></a></div>
    <div class="weui-flex__item"><a href="http://zzfkzf.shzmzxw.com"><div class="placeholder">购买卡密账号</div></a></div>
    <?php if($_G['member']['username']): ?>
        <div class="weui-flex__item"><div class="placeholder"><?php echo htmlentities($_G['member']['username']); ?></div></div>
    <?php else: ?>
        <div class="weui-flex__item"  onclick="navLoad(this)" data-url="<?php echo url('wap/index/login'); ?>"><div class="placeholder">登录</div></div>
    <?php endif; ?>
</div>

<div class="weui-flex updatetime">
    <div class="weui-flex__item"><div class="placeholdero1">到期时间：<font style="color:red">
                <?php if($_G['member']['out_time']): ?>
                <?php echo date('Y-m-d H:i',$_G['member']['out_time']); else: ?>
                    暂无到期时间
                <?php endif; ?>
            </font>
            <?php if($_G['member']): ?>
            <span class="logout_post" style="margin-left: 30px;">退出登录</span>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function navLoad(dom) {
        window.location.href=dom.getAttribute('data-url')
    }
    $(function () {
        $('body').on('click','.logout_post',function (r) {

            $.post("<?php echo url('wap/index/logout'); ?>",{},function (r) {

                if(r.code==1){
                    alert('退出成功')
                    window.location.href="<?php echo url('wap/index/index'); ?>"
                }else{
                    alert('退出登录失败')
                    return false
                }

            },'json')

        })
    })

</script>


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
        <p><?php echo $_G['setting']['mobile_cont']; ?></p>
    </article>

     </div>
        <?php if($_G['member']): ?>
<div class="weui-tabbar">
    <a href="<?php echo url('wap/index/index'); ?>" class="weui-tabbar__item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'index'): ?>weui-bar__item_on<?php endif; ?> ">
        <img src="/static/images/Home.png" alt="" class="weui-tabbar__icon   ">
        <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="<?php echo url('wap/index/parse_list'); ?>" class="weui-tabbar__item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'parse_list'): ?>weui-bar__item_on<?php endif; ?>">
        <img src="/static/images/jiexi_list.png" alt="" class="weui-tabbar__icon">
        <p class="weui-tabbar__label">解析记录</p>
    </a>

    <a href="<?php echo url('wap/index/user'); ?>" class="weui-tabbar__item  <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'user'): ?>weui-bar__item_on<?php endif; ?>">
        <img src="/static/images/user.png" alt="" class="weui-tabbar__icon">
        <p class="weui-tabbar__label">个人中心</p>
    </a>
</div>
<?php endif; ?>
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
            $.post("<?php echo url('index/index/parse'); ?>",{link:$link,verify:code},function (s) {
               
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
        url : '<?php echo url('index/index/parse'); ?>',//你处理的url
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







</div>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?e58c2ac250afe009b339287bf35ce420";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>