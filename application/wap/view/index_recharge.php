<div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">
            <div class="weui-panel__bd">
                <h1 class="page__title" style="padding-left: 10px;font-size: 16px;margin-top: 10px;">账户充值</h1>
                <div class="weui-cell" style="background: #fff;margin-top: 10px;">
                    <div class="weui-cell__hd"><label class="weui-label">充值卡密</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input card_id" type="text" name="card_id" required placeholder="请输入账号">
                    </div>
                </div>
                <div class="weui-btn-area">
                    <a class="weui-btn weui-btn_primary user_register" href="javascript:" >充值</a>
                </div>
            </div>
        </div>
        {include file="common/tab"}
    </div>
</div>
<script>
    $('body').on('click','.user_register',function () {
        card_id = $('.card_id').val();

        $.post("{:url('index/user/recharge')}",{card_id:card_id},function (r) {
            if(r.code==1){
                alert('充值成功');
                window.location.href="{:url('wap/index/user')}"
            }else{
                alert(r.msg)
            }
            return false
        },'json')
    })
</script>