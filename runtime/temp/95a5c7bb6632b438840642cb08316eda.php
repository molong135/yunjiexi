<?php /*a:5:{s:76:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/index_parse_list.php";i:1563259224;s:66:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/layout.php";i:1563250196;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_header.php";i:1571645700;s:70:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_tab.php";i:1563266420;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/wap/view/common_footer.php";i:1571660765;}*/ ?>
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

            <div class="weui-panel__bd jiexi_list" style="">

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
<style>
    .jiexi_list{
        background: #fff;
        color: #000
    }
    .weui-media-box__title{
        font-size: 15px;
    }
</style>
<script>

    var page=1;
    var reQuestTyep=true;

    function ajax_request(){
        reQuestTyep =false;
        $.post("<?php echo url('wap/index/parseListJson'); ?>", {page:page}, function(data) {
            if(data.status==200 && data.data.length>0){
                parse_tpl(data.data)
            } else if(data.status==200 && data.data.length==0){
                    return false
            }else{
                alert(data.msg)
            }
            return  false
        },'json');
    }
    function scrollIndexLIst(){

    }
    function parse_tpl(data) {

        var str_html = ''
        for (j in data){
            str_html+='<div class="weui-media-box weui-media-box_text">'
            str_html+='    <h4 class="weui-media-box__title new_title">来源：'+data[j].title+'</h4>'
            str_html+='    <p class="weui-media-box__desc">解析地址：'+data[j].parse_url+'</p>'
            str_html+='    <p class="weui-media-box__desc">解析时间：'+data[j].create_time+'</p>'
            if(data[j].status==1){
                str_html+='    <p class="weui-media-box__desc">解析状态：成功</p>'
            }else{
                str_html+='    <p class="weui-media-box__desc">解析状态：失败</p>'
            }


            str_html+='</div>'
        }
        $('.jiexi_list').append(str_html)

        reQuestTyep=true
        page++

        
    }
    ajax_request();


    $(function () {
        $(window).scroll(function () {
            alert(111)
        })
    })
    $('.weui-tab__panel').scroll(function () {
        var nDivHight = $(".weui-tab__panel").height();
        nScrollHight = $(this)[0].scrollHeight;
        nScrollTop = $(this)[0].scrollTop;
        if(nScrollTop + nDivHight >= nScrollHight){
            if(reQuestTyep==true){
                ajax_request();
            }
        }
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