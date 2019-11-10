<body>
<div class="lefter">
    <div class="logo"><a href="/console/index"><img src="/static/yifile/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
              
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="index.html" class="icon-home"> 个人中心</a>


                <ul>
                  <li id="shubiao"><a href="{:url('ycont/user/index')}">个人中心</a></li>
                  <li id="shubiao"><a href="{:url('ycont/user/recharge')}">账户充值</a></li>
                  <li id="shubiao"><a href="{:url('ycont/user/download')}">解析记录</a></li>
                  <li id="shubiao"><a href="{:url('ycont/user/password')}">修改密码</a></li>
    
                </ul>
                </li>
                
            </ul>
        </div>
        <div class="admin-bread">
            <span>
        {if $_G['uid']}
      
          
            {$_G['member']['username']}

            {if $_G['member']['type'] == 'system'}
              (管理员)
            {else}
              {if $_G['member']['out_time'] == 0}
                (永久有效)
              {elseif $_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()}
                (已过期)
              {else}
                ({:date('Y-m-d H:i',$_G['member']['out_time'])})
              {/if}
            {/if}

 
       {else}
       你没有登录
 
      {/if}
            </span>

        </div>
    </div>
</div>
<!--内容页-->
<div class="admin">
    <div class="line-big">
        
      