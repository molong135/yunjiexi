{if $_G['member']}
<div class="weui-tabbar">
    <a href="{:url('wap/index/index')}" class="weui-tabbar__item {if $Request.controller == 'Index' && $Request.action == 'index'}weui-bar__item_on{/if} ">
        <img src="/static/images/Home.png" alt="" class="weui-tabbar__icon   ">
        <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="{:url('wap/index/parse_list')}" class="weui-tabbar__item {if $Request.controller == 'Index' && $Request.action == 'parse_list'}weui-bar__item_on{/if}">
        <img src="/static/images/jiexi_list.png" alt="" class="weui-tabbar__icon">
        <p class="weui-tabbar__label">解析记录</p>
    </a>

    <a href="{:url('wap/index/user')}" class="weui-tabbar__item  {if $Request.controller == 'Index' && $Request.action == 'user'}weui-bar__item_on{/if}">
        <img src="/static/images/user.png" alt="" class="weui-tabbar__icon">
        <p class="weui-tabbar__label">个人中心</p>
    </a>
</div>
{/if}