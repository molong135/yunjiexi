<div class="weui-flex nav">
    <div class="weui-flex__item" onclick="navLoad(this)" data-url="{:url('wap/index/index')}" ><div class="placeholder">首页</div></div>
    <div class="weui-flex__item" onclick="navLoad(this)" ><a href="{:url('wap/index/chanping')}"><div class="placeholder">实例</div></a></div>
    <div class="weui-flex__item"><a href="http://zzfkzf.shzmzxw.com"><div class="placeholder">购买卡密账号</div></a></div>
    {if $_G['member']['username']}
        <div class="weui-flex__item"><div class="placeholder">{$_G['member']['username']}</div></div>
    {else}
        <div class="weui-flex__item"  onclick="navLoad(this)" data-url="{:url('wap/index/login')}"><div class="placeholder">登录</div></div>
    {/if}
</div>

<div class="weui-flex updatetime">
    <div class="weui-flex__item"><div class="placeholdero1">到期时间：<font style="color:red">
                {if $_G['member']['out_time'] }
                {:date('Y-m-d H:i',$_G['member']['out_time'])}
                {else}
                    暂无到期时间
                {/if}
            </font>
            {if $_G['member']}
            <span class="logout_post" style="margin-left: 30px;">退出登录</span>
            {/if}
        </div>
    </div>
</div>

<script>
    function navLoad(dom) {
        window.location.href=dom.getAttribute('data-url')
    }
    $(function () {
        $('body').on('click','.logout_post',function (r) {

            $.post("{:url('wap/index/logout')}",{},function (r) {

                if(r.code==1){
                    alert('退出成功')
                    window.location.href="{:url('wap/index/index')}"
                }else{
                    alert('退出登录失败')
                    return false
                }

            },'json')

        })
    })

</script>

