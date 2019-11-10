<?php /*a:5:{s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\index_user.php";i:1563265961;s:60:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\layout.php";i:1563250194;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_header.php";i:1563243654;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_tab.php";i:1563266419;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_footer.php";i:1563246342;}*/ ?>
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
        <div class="weui-panel__bd" >
            <h1 class="page__title" style="padding-left: 10px;font-size: 18px;margin-top: 10px;">个人中心</h1>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="<?php echo url('wap/index/recharge'); ?>">
                    <div class="weui-cell__bd">
                        <p>充值</p>
                    </div>
                    <div class="weui-cell__ft">
                    </div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo url('wap/index/password'); ?>">
                    <div class="weui-cell__bd">
                        <p>密码修改</p>
                    </div>
                    <div class="weui-cell__ft">
                    </div>
                </a>
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

</div>

<script>

</script>
</body>
</html>