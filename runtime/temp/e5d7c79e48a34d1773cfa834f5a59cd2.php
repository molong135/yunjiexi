<?php /*a:5:{s:74:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/index_recharge.php";i:1563265912;s:66:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/layout.php";i:1563250196;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_header.php";i:1571645700;s:70:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_tab.php";i:1563266420;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_footer.php";i:1571660765;}*/ ?>
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
    <div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">
            <div class="weui-panel__bd">
                <h1 class="page__title" style="padding-left: 10px;font-size: 16px;margin-top: 10px;">账户充值</h1>
                <div class="weui-cell" style="background: #fff;margin-top: 10px;">
                    <div class="weui-cell__hd"><label class="weui-label">充值卡密</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input card_id" type="text" name="card_id" required placeholder="请输入账号">
                    </div>
                </div>
                <div class="weui-btn-area">
                    <a class="weui-btn weui-btn_primary user_register" href="javascript:" >充值</a>
                </div>
            </div>
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
</div>
<script>
    $('body').on('click','.user_register',function () {
        card_id = $('.card_id').val();

        $.post("<?php echo url('index/user/recharge'); ?>",{card_id:card_id},function (r) {
            if(r.code==1){
                alert('充值成功');
                window.location.href="<?php echo url('wap/index/user'); ?>"
            }else{
                alert(r.msg)
            }
            return false
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