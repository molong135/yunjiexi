<body>
<div class="page__bd">
    {include file="common/nav"}

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
        <a class="weui-btn weui-btn_primary "style="display:none;" href="{:url('wap/index/register')}" >注册</a>

    </div>

</div>
<script>
    $('body').on('click','.ajax_login',function () {
        var password = $('.password').val();
        var account = $('.account').val();
        $.post("{:url('index/account/login')}",{password:password,account:account},function (r) {
            if(r.code==1){
                alert('登录成功');
                window.location.href="{:url('wap/index/index')}"
                return false
            }else{
                alert(r.msg)
            }
            return  false
        },'json')

    })
</script>
