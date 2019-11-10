<?php /*a:5:{s:68:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\index_password.php";i:1563266244;s:60:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\layout.php";i:1563250194;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_header.php";i:1563243654;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_tab.php";i:1563266419;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_footer.php";i:1563246342;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>网盘解析</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
    <link rel="stylesheet" type="text/css" href="/static/css/weui.css">
    <link rel="stylesheet" type="text/css" href="/static/css/example.css">
    <link rel="stylesheet" type="text/css" href="/static/css/weui_more.css">
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/static/js/common.js"></script>

</head>

<div class="container">
    <?php if($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()): ?>
    <div class="alert alert-primary" role="alert">您的账户已过期，无法解析资源，请联系管理员增加时间或获取新账号！</div>
    <?php endif; ?>
    <div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">
            <div class="weui-panel__bd">
                <h1 class="page__title" style="padding-left: 10px;font-size: 16px;margin-top: 10px;">修改密码</h1>
                <div class="weui-cell" style="background: #fff;margin-top: 10px;">
                    <div class="weui-cell__hd"><label class="weui-label">当前密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input oldpassword" type="text" name="oldpassword" required placeholder="请输入账号">
                    </div>

                </div>
                <div class="weui-cell" style="background: #fff;">
                    <div class="weui-cell__hd"><label class="weui-label">新 密 码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input password" type="password" name="password" required placeholder="请输入账号">
                    </div>
                </div>
                <div class="weui-cell" style="background: #fff;">
                    <div class="weui-cell__hd"><label class="weui-label">重复新密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input password_confirm" type="password" name="password_confirm" required placeholder="请输入账号">
                    </div>
                </div>
                <div class="weui-btn-area">
                    <a class="weui-btn weui-btn_primary user_register" href="javascript:" >确认</a>
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
        oldpassword = $('.oldpassword').val();
        password = $('.password').val();
        password_confirm = $('.password_confirm').val();

        $.post("<?php echo url('index/user/password'); ?>",{oldpassword:oldpassword,password:password,password_confirm:password_confirm},function (r) {
            if(r.code==1){
                alert('修改成功');
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

</script>
</body>
</html>