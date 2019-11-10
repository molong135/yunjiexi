<div class="url-box">
	<input type="text" class="url-text" placeholder="需要解析的链接地址" spellcheck="false">
	<div class="submit parse-btn {if !empty($between_time)}parse-disabled{/if}">{if !empty($between_time)}<span>{$between_time}</span> 秒{else}解 析{/if}</div>
</div>
<div class="download-url-box text-center d-none mb-5"></div>
<div id="TencentCaptcha" class="text-center mb-5" style="display: none; border:1px solid red;width:20%;margin:0 auto;height:30px;line-height:30px;"  data-appid="2071654847" data-cbfn="callback">点 此 进 行 验 证</div>
<div class="card user-power mb-5">
	<div class="card-header">目前支持的网站</div>
	<div class="card-body">
		<div class="site-list">
			网页版支持的网盘：
			{foreach $rjbnode as $site}
				<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="官网：{$site['url']}">{$site['title']}</span>
			{/foreach}
			<br/>
			windons软版支持的网盘：
			{foreach $site_list as $site}
				<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="官网：{$site['url']}">{$site['title']}</span>
			{/foreach}
		</div>
		<p style="margin-top: 10px;">第一次使用者没有账号请先购买账号在充值,软件版和云解析通用账号</p>
       <a herf="https://www.lanzous.com/i7674mb">下载地址:https://www.lanzous.com/i7674mb</a>
	</div>
</div>

<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>

<script>
	var updateTime,timeout = {$between_time??0};
	$(function(){
		$(document)
			.on('click','.submit',function(){
				$('.download-url-box').html('<p>正在努力解析中...</p>');
				var link = $.trim($('.url-text').val());
				if(!link){
					$('.url-text').focus();
					return dialog.msg('请输入需要解析的网址');
				}
				parse_link(link);
			})
	})
	function parse_link(link,verify_code){
		$('.submit').addClass('disabled').html('解析中...');
		$.ajax({
			url:'{:url('index/index/parse')}',
			data:{link:link,verify:verify_code},
			dataType:'json',
			type:'POST',
			success:function(s){
				console.log(s);
				if(s.code == -1){
					dialog.open({
						type: 1,
						title: '请输入验证码',
						closeBtn: false,
						area: '300px;',
						shade: 0.8,
						id: 'LAY_layuipro',
						resize: false,
						btn: ['确定提交', '取消输入'],
						btnAlign: 'c',
						moveType: 1,
						content: s.data,
						yes: function(){
							dialog.closeAll();
							var verify_code = $('#verify_code').val();
							parse_link(link,verify_code);
						},
						btn2: function(){
							dialog.closeAll();
						}
					});
					return false;
				}
				if(s.code == 1){

					var urllist = '';
					$.each(s.data,function(name,url){
						urllist += '<a class="btn btn-danger '+(urllist != '' ? 'ml-3' : '')+'" href="'+url+'">'+name+'</a>';
					})
					
					timeout = {$_G['setting']['parse_between_time']??0};
					if(timeout > 0){
						parse_time();
					}
				}else if (s.code == -2){
					 $('#TencentCaptcha').show();
					
					urllist = s.msg;
				}else{
					urllist = s.msg;
				}
				$('.download-url-box').removeClass('d-none').html(urllist).show();
                dialog.msg(s.msg);
			},
            complete:function(request, status){
                $('.submit').removeClass('disabled').html('解 析');
                if(status == 'error'){
                    dialog.msg('页面错误，请联系管理员！');
                }else if(status == 'timeout'){
                    dialog.msg('数据提交超时，请稍后再试！');
                }
            }
		})
	}
	function parse_time(){
		timeout--;
		clearTimeout(updateTime);
		if(timeout <= 0){
			$('.parse-btn').html('解 析');
			return true;
		}
		$('.parse-btn').html(timeout+' 秒');
		updateTime = setTimeout(function(){
			parse_time();
		},1000)
	}
	{if !empty($between_time)}parse_time();{/if}
</script>
<script>
window.callback = function(res){
    console.log(res)
    $('#TencentCaptcha').hide();
    $('.download-url-box').removeClass('d-none').html('').show();
	var link = $.trim($('.url-text').val());
	$('.submit').addClass('disabled').html('解析中...');
    if(res.ret === 0){
		$.ajax({
		type : 'post',
		url : '{:url('index/index/parse')}',//你处理的url
		//data : 'id=587415&tip=222.178.215.66&tmd5=&ticket='+ res.ticket + '&randstr=' + res.randstr,
		data:{link:link,verify:res},
		dataType : 'json',
		success:function(s){
			$('.submit').removeClass('disabled').html('解 析');
			var urllist = '';
			$.each(s.data,function(name,url){
				urllist += '<a class="btn btn-danger '+(urllist != '' ? 'ml-3' : '')+'" href="'+url+'">'+name+'</a>';
			})
			timeout = {$_G['setting']['parse_between_time']??0};
			if(timeout > 0){
				parse_time();
			}
			$('.download-url-box').removeClass('d-none').html(urllist).show();
                dialog.msg(s.msg);
		},
		error:function(){
		}
	});
    }
}
</script>
