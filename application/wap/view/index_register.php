<body>
<div class="page__bd">
    {include file="common/nav"}
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input username" type="text" name="username" required placeholder="请输入账号">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password" type="password"  name="password" required  placeholder="请输入密码">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">重复密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input password_confirm" type="password"  name="password_confirm" required  placeholder="请输入密码">
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary user_register" href="javascript:" >注册</a>
        <a class="weui-btn weui-btn_default" href="{:url('wap/index/login')}" >登录</a>
    </div>
    <script>

        $('body').on('click','.user_register',function () {
            var username  = $('.username').val();
            var password = $('.password').val();
            var password_confirm = $('.password_confirm').val();
            $.post("{:url('index/account/register')}",{username:username,password:password,password_confirm:password_confirm},function (r) {

                if (r.code==1){
                    alert('注册成功')
                    window.location.href="{:url('wap/index/index')}"
                }else{
                    alert(r.msg)
                }
                return false

            },'json')
        })

    </script>

</div>
</body>