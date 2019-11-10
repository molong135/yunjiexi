<?php /*a:6:{s:65:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\index_index.php";i:1563445404;s:60:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\layout.php";i:1563250194;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_header.php";i:1563243654;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_nav.php";i:1563326982;s:64:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_tab.php";i:1563266419;s:67:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\wap\view\common_footer.php";i:1563246342;}*/ ?>
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
    <body>
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
</style>
<script>
    var _this
    var type=1
    $('body').on('click','.post_parse',function () {

             _this= $(this)
            _this.attr('disabled',"true")
            $(this).html('<div style="color: red">解析中</div>')

            parse_link_url();

    })
    function parse_link_url() {
        setTimeout(function () {
            $link=$('.parse_url_string').val();
            $.post("<?php echo url('index/index/parse'); ?>",{link:$link},function (s) {
                _this.removeAttr("disabled")
                if(s.code==1){
                    var urllist = '';
                    $.each(s.data,function(name,url){
                        urllist+='<a class="weui-flex__item "  href="'+url+'" target="_blank" ><div class="placeholder">'+name+'</div></a>'
                    })
                    $('.prase_html').html(urllist)
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




</div>

<script>

</script>
</body>
</html>