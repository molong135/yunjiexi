
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

       <div class="card-header">解析记录 (可查看最近二十条解析记录)</div>


        <div class="padding border-bottom">
     	{if $log_list->isEmpty()}
					<div class="p-5 text-center text-muted display-1">暂无记录</div>
		{else}   
        
        <table class="table table-hover">
        	<tr>
        		<th width="20%">源网站</th>
        		<th width="20%">解析地址</th>
                <th width="20%">解析时间</th>
        		<th width="20%">消耗次数</th>
                <th width="20%">状态</th>
        	</tr>
            {volist name="log_list" id="log"}
				<tr>
					<td align="right">{$log['website']['title']}</td>
					<td>{$log['parse_url']}</td>
					<td>{$log['create_time']}</td>
					<td>{$log['times']}</td>
					<td>{$log['status_text']}</td>
				</tr>
			{/volist}

	    </table>
        {/if}

        <div class="panel-foot text-center">
    
        </div>

    </div>


 <!--底部 end-->
 