<?php /*a:5:{s:71:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/index_login.php";i:1565239880;s:66:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/layout.php";i:1563250196;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_header.php";i:1571645700;s:70:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_nav.php";i:1571646090;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_footer.php";i:1571660765;}*/ ?>
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
<div class="page__bd">
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



    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input account" type="text" name="account" required placeholder="请输入账号">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password" type="password"  name="password" required  placeholder="请输入密码">
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary ajax_login" href="javascript:" >登录</a>
        <a class="weui-btn weui-btn_primary "style="display:none;" href="<?php echo url('wap/index/register'); ?>" >注册</a>

    </div>

</div>
<script>
    $('body').on('click','.ajax_login',function () {
        var password = $('.password').val();
        var account = $('.account').val();
        $.post("<?php echo url('index/account/login'); ?>",{password:password,account:account},function (r) {
            if(r.code==1){
                alert('登录成功');
                window.location.href="<?php echo url('wap/index/index'); ?>"
                return false
            }else{
                alert(r.msg)
            }
            return  false
        },'json')

    })
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