<?php /*a:6:{s:68:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\index_chanping.php";i:1563328447;s:60:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\layout.php";i:1563250194;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_header.php";i:1563243654;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_nav.php";i:1563326982;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_tab.php";i:1563266419;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_footer.php";i:1563246342;}*/ ?>
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
    <div class="weui-flex nav">
    <div class="weui-flex__item" onclick="navLoad(this)" data-url="<?php echo url('wap/index/index'); ?>" ><div class="placeholder">首页</div></div>
    <div class="weui-flex__item" onclick="navLoad(this)" ><a href="<?php echo url('wap/index/chanping'); ?>"><div class="placeholder">实例</div></a></div>
    <div class="weui-flex__item"><a href="http://pei.982ka.cn/Fast/Index.aspx"><div class="placeholder">购买卡密</div></a></div>
    <?php if($_G['member']['username']): ?>
        <div class="weui-flex__item"><div class="placeholder"><?php echo htmlentities($_G['member']['username']); ?></div></div>
    <?php else: ?>
        <div class="weui-flex__item"  onclick="navLoad(this)" data-url="<?php echo url('wap/index/login'); ?>"><div class="placeholder">登录|注册</div></div>
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
   
    

        <div align="center">
            <video width="320" height="380" controls autoplay="autoplay">
                <source src="/static/pc_yunjc_01.mp4" type="video/mp4">
            </video>
        </div>
     <h1 align="center">教程说明</h1> 
     <div align="center"><a href="/static/pc_yunjc_01.txt" download="云解析事项">本教程事项下载.txt</a></div>

    
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
</div>
</div>

<script>

</script>
</body>
</html>