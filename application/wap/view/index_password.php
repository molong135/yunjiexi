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
        {include file="common/tab"}
    </div>
</div>
<script>
    $('body').on('click','.user_register',function () {
        oldpassword = $('.oldpassword').val();
        password = $('.password').val();
        password_confirm = $('.password_confirm').val();

        $.post("{:url('index/user/password')}",{oldpassword:oldpassword,password:password,password_confirm:password_confirm},function (r) {
            if(r.code==1){
                alert('修改成功');
                window.location.href="{:url('wap/index/user')}"
            }else{
                alert(r.msg)
            }
            return false
        },'json')
    })
</script>