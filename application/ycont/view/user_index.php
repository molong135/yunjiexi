
 <!--菜单 end-->


    <div class="panel admin-panel">
    	<div class="panel-head"><strong>个人中心</strong></div>
        {if $_G['member']['out_time'] > 0}
            {if $_G['member']['out_time'] <= request()->time()}
                <div class="alert alert-danger">您的账号已于 <strong>{:date('Y-m-d H:i',$_G['member']['out_time'])}</strong> 过期，无法继续解析素材，请联系管理员！</div>
            {else}
                <div class="alert alert-success">您的账号有效期至： <strong>{:date('Y-m-d H:i',$_G['member']['out_time'])}</strong> 当前可正常解析素材</div>
            {/if}
        {elseif $_G['member']['out_time'] == 0 && $_G['member']['type'] != 'system'}
            <div class="alert alert-success">您的账号为永久会员，当前可正常解析素材</div>
        {/if}

       <div class="card-header">我的权限 (每日凌晨00:00更新下载次数) 当前账户可解析 {$_G['member']['parse_max_times'] == -1 ? '无权解析' : ($_G['member']['parse_max_times'] ==0 ? '无限制' : $_G['member']['parse_max_times'].'次')}</div>


        <div class="padding border-bottom">
             
        
        <table class="table table-hover">
        	<tr>
        		<th width="20%">使用项目</th>
        		<th width="20%">今日解析次数</th>
                <th width="20%">今日可以解析</th>
        		<th width="20%">今日以使用</th>
                <th width="20%">可以解析次数</th>
        	</tr>
              {php}$i=0;{/php}
           {foreach $_G['member']['site_access'] as $site_id => $access}
          

                    {php}
                        if (empty($_G['web_site'][$site_id]) || $_G['web_site'][$site_id]['status']<=0){
                            continue;
                        }
                    {/php}
                    <tr>
                        <td>{$_G['web_site'][$site_id]['title']} ： </td>
                        <td class="border-top-0">
                            今日已解析：<strong class="text-danger pr-3">{$access['day_used']??0}次</strong>
                        </td>
                        <td class="border-top-0">
                            每日可解析：<strong class="text-info pr-3">{$access['day']??0}次</strong>
                        </td>
                        <td class="border-top-0">
                            已解析：<strong class="text-danger pr-3">{$access['max_used']??0}次</strong>
                        </td class="border-top-0">
                        <td>
                            可解析次数：<strong class="text-info pr-3">{$access['all']??0}次</strong>
                        </td>
                    </tr>
                    {php}$i++;{/php}            
            	
       
        {/foreach}

        </table>
        <div class="panel-foot text-center">
    
        </div>

    </div>


 <!--底部 end-->
 