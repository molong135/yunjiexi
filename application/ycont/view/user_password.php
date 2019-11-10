  <div class="panel admin-panel">
        <div class="panel-head"><strong>修改密码</strong></div>


                </div>
                <div class="form-group">
                    <div class="label"><label for="password">当前密码</label></div>
                    <div class="field">
                        <input type="password" class="input oldpassword"  name="oldpassword" size="20" placeholder="当前密码" />
                    </div>
                     <div class="label"><label for="password">新密码</label></div>
                    <div class="field">
                        <input type="password" class="input password"  name="password" size="20" placeholder="新密码" />
                    </div>
                     <div class="label"><label for="password">重复密码</label></div>
                    <div class="field">
                        <input type="password" class="input password_confirm"  name="password_confirm" size="20" placeholder="重复密码" />
                    </div>
                    <i style="color:red;" id="tsxx"> </i>
                </div>
                <div class="form-button user_register" align="center" ><button class="button bg-main" type="submit" id="sure">确定修改</button></div>

<script>
    $('body').on('click','.user_register',function () {
         $("#tsxx").hide();
        oldpassword = $('.oldpassword').val();
        password = $('.password').val();
        password_confirm = $('.password_confirm').val();

        $.post("{:url('ycont/user/password')}",{oldpassword:oldpassword,password:password,password_confirm:password_confirm},function (r) {
            if(r.code==1){
                alert('修改成功');
                window.location.href="{:url('ycont/user/index')}"
            }else{
               $("#tsxx").show();
                $("#tsxx").html(r.msg);
            }
            return false
        },'json')
    })
</script>