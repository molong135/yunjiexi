{include file="common/header"}
<div class="container">
    {if $_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()}
    <div class="alert alert-primary" role="alert">您的账户已过期，无法解析资源，请联系管理员增加时间或获取新账号！</div>
    {/if}
    {__CONTENT__}
</div>

{include file="common/footer"}