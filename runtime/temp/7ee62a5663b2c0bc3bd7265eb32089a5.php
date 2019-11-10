<?php /*a:4:{s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/index/view/index_index.php";i:1572877799;s:68:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/index/view/layout.php";i:1571646090;s:75:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/index/view/public_header.php";i:1571645584;s:75:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/index/view/public_footer.php";i:1571660736;}*/ ?>
<!DOCTYPE html>

<html style="background: #f2f2f2;">

<head>

	<meta charset="utf-8">

	<meta name="renderer" content="webkit">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content="always" name="referrer">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo htmlentities($_G['setting']['site_name']); ?></title>

    <meta name="description" content="<?php echo htmlentities($_G['setting']['description']); ?>" />

    <meta name="keywords" content="<?php echo htmlentities($_G['setting']['keywords']); ?>" />

    <base href="<?php echo htmlentities($_G['site_url']); ?>">

	<script src="static/js/jquery-3.3.1.min.js"></script>

	<script src="static/js/bootstrap.min.js"></script>
	<script src="static/js/lrtk.js"></script>

	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="static/css/common.css">
	<link rel="stylesheet" type="text/css" href="static/css/lrtk.css">
	  <script type="text/javascript">if(window.location.toString().indexOf('pref=padindex') != -1){}else{if(/AppleWebKit.*Mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))){if(window.location.href.indexOf("?mobile")<0){try{if(/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){window.location.href="/wap";}else if(/iPad/i.test(navigator.userAgent)){}else{}}catch(e){}}}}</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?37d28886ee54aa40389ba2013c684f6a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</head>

<body>
<!-- 代码 开始 -->
<div id="top"></div>
<!-- 代码 结束 -->

<nav class="navbar navbar-expand-lg navbar-index bg-info">
	<div class="container">
	<a class="navbar-brand" href="<?php echo htmlentities($_G['site_url']); ?>"><img src="static/images/123-1.png" style="height: 56px;width: 147px;"></a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'index'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/index'); ?>">资源解析</a>
			</li>
			<li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/demo'); ?>">解析示例</a>
			</li><li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/chenpian'); ?>" target="_blank">操作演示</a>
			</li><li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" id="gmkh" target="_blank" href="http://zzfkzf.shzmzxw.com">购买卡密账号</a>
			</li>
          
		</ul>
		<div class="navbar-nav">

			<?php if($_G['uid']): ?>
				<li class="nav-item <?php if(app('request')->controller() == 'User'): ?>active<?php endif; ?>">
					<a class="nav-link" href="<?php echo url('index/user/index'); ?>">
						<?php echo htmlentities($_G['member']['username']); if($_G['member']['type'] == 'system'): ?>
							(管理员)
						<?php else: if($_G['member']['out_time'] == 0): ?>
								(永久有效)
							<?php elseif($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()): ?>
								(已过期)
							<?php else: ?>
								(<?php echo date('Y-m-d H:i',$_G['member']['out_time']); ?>)
							<?php endif; ?>
						<?php endif; ?>
					</a>
				</li>
				<li class="nav-item"><a class="nav-link" href="<?php echo url('index/user/index'); ?>">个人中心</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo url('index/account/logout'); ?>">安全退出</a></li>
			<?php else: ?>
				<li class="nav-item"><a class="nav-link" href="<?php echo url('index/account/login'); ?>">登录</a></li>
				<?php if($_G['setting']['allow_register']): ?>
					<li class="nav-item"><a class="nav-link" href="<?php echo url('index/account/register'); ?>">注册</a></li>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	</div>
</nav>
<div class="container">
	<?php if($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()): ?>
		<div class="alert alert-primary" role="alert">您的账户已过期，无法解析资源，请联系管理员增加时间或获取新账号！</div>
	<?php endif; ?>
	<div class="url-box">
	<input type="text" class="url-text" placeholder="需要解析的链接地址" spellcheck="false">
	<div class="submit parse-btn <?php if(!empty($between_time)): ?>parse-disabled<?php endif; ?>"><?php if(!empty($between_time)): ?><span><?php echo htmlentities($between_time); ?></span> 秒<?php else: ?>解 析<?php endif; ?></div>
</div>
<div class="download-url-box text-center d-none mb-5"></div>
<div id="TencentCaptcha" class="text-center mb-5" style="display: none; border:1px solid red;width:20%;margin:0 auto;height:30px;line-height:30px;"  data-appid="2071654847" data-cbfn="callback">点 此 进 行 验 证</div>
<div class="card user-power mb-5">
	<div class="card-header">目前支持的网站</div>
	<div class="card-body">
		<div class="site-list">
			网页版支持的网盘：
			<?php foreach($rjbnode as $site): ?>
				<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="官网：<?php echo htmlentities($site['url']); ?>"><?php echo htmlentities($site['title']); ?></span>
			<?php endforeach; ?>
			<br/>
			windons软版支持的网盘：
			<?php foreach($site_list as $site): ?>
				<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="官网：<?php echo htmlentities($site['url']); ?>"><?php echo htmlentities($site['title']); ?></span>
			<?php endforeach; ?>
		</div>
		<p style="margin-top: 10px;">第一次使用者没有账号请先购买账号在充值,软件版和云解析通用账号</p>
       <a herf="https://www.lanzous.com/i7674mb">下载地址:https://www.lanzous.com/i7674mb</a>
	</div>
</div>

<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>

<script>
	var updateTime,timeout = <?php echo isset($between_time) ? htmlentities($between_time) : 0; ?>;
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
			url:'<?php echo url('index/index/parse'); ?>',
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
					
					timeout = <?php echo isset($_G['setting']['parse_between_time']) ? htmlentities($_G['setting']['parse_between_time']) : 0; ?>;
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
	<?php if(!empty($between_time)): ?>parse_time();<?php endif; ?>
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
		url : '<?php echo url('index/index/parse'); ?>',//你处理的url
		//data : 'id=587415&tip=222.178.215.66&tmd5=&ticket='+ res.ticket + '&randstr=' + res.randstr,
		data:{link:link,verify:res},
		dataType : 'json',
		success:function(s){
			$('.submit').removeClass('disabled').html('解 析');
			var urllist = '';
			$.each(s.data,function(name,url){
				urllist += '<a class="btn btn-danger '+(urllist != '' ? 'ml-3' : '')+'" href="'+url+'">'+name+'</a>';
			})
			timeout = <?php echo isset($_G['setting']['parse_between_time']) ? htmlentities($_G['setting']['parse_between_time']) : 0; ?>;
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

</div>
<?php if(!empty($_G['setting']['footer'])): ?>
	<?php echo $_G['setting']['footer']; else: ?>
	<footer>
		<div class="container text-center">
			<p>© 2019 <?php if($_G['setting']['qq']): ?>QQ：<?php echo htmlentities($_G['setting']['qq']); ?><?php endif; ?></p>
			<p>
				<span><a href="<?php echo url('index/index/index'); ?>">素材解析</a></span>
				<span><a href="<?php echo url('index/index/index'); ?>">网站首页</a></span>
			</p>
			<p>本站内容完全来自于互联网，并不对其进行任何编辑或修改。本站用户不能侵犯包括他人的著作权在内的知识产权以及其他权利</p>
		</div>
	</footer>
<?php endif; ?>
<script type="text/javascript" src="static/js/common.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?e58c2ac250afe009b339287bf35ce420";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>

