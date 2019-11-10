  <div class="panel admin-panel">
    	<div class="panel-head"><strong>充值卡充值</strong></div>

                    <div class="field" style="margin: 14px;">
                    	<label>当前用户名：</label>

                    	<span>{$_G['member']['username']}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="password">充值卡密</label></div>
                    <div class="field">
                    	<input type="password" class="input card_id"  name="card_id" size="20" placeholder="充值卡密" />
                    </div>
                    <i style="color:red;" id="tsxx"> </i>
                </div>
                <div class="form-button user_register" align="center" ><button class="button bg-main" type="submit" id="sure">确定充值</button></div>
                
<script>
    $('body').on('click','.user_register',function () {
        card_id = $('.card_id').val();
         $("#tsxx").hide();
        $.post("{:url('ycont/user/recharge')}",{card_id:card_id},function (r) {
            if(r.code==1){
                alert('充值成功');
                window.location.href="{:url('ycont/user/index')}"
            }else{
            	$("#tsxx").show();
            	//$("#tsxx")[0].innerHTML =r.msg;
            	$("#tsxx").html(r.msg);
            }
            return false
        },'json')
    })
</script>