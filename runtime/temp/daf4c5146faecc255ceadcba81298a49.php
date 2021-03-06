<?php /*a:5:{s:58:"E:\PHP\Wp.shzmzxw\application\index\view\user_recharge.php";i:1555074964;s:51:"E:\PHP\Wp.shzmzxw\application\index\view\layout.php";i:1571646088;s:58:"E:\PHP\Wp.shzmzxw\application\index\view\public_header.php";i:1571645582;s:54:"E:\PHP\Wp.shzmzxw\application\index\view\user_left.php";i:1555074814;s:58:"E:\PHP\Wp.shzmzxw\application\index\view\public_footer.php";i:1565239046;}*/ ?>
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
	<div class="row my-5">
	<div class="col-2">
	<div class="list-group">
		<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'index'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/index'); ?>">个人中心</a>
		<?php if(in_array($_G['member']['type'],['system','proxy'])): ?>
			<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'proxy'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/proxy'); ?>">代理中心</a>
		<?php endif; ?>
		<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'recharge'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/recharge'); ?>">账户充值</a>
		<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'download'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/download'); ?>">解析记录</a>
		<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'profile'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/profile'); ?>">修改资料</a>
		<a class="list-group-item list-group-item-action <?php if(app('request')->action() == 'password'): ?>list-group-item-success<?php endif; ?>" href="<?php echo url('index/user/password'); ?>">修改密码</a>
	</div>
</div>

	<div class="col-10">
		<form autocomplete="off">
			<div class="card">
				<div class="card-header">充值卡充值</div>
				<div class="card-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">当前用户名</label>
						<div class="col-sm-10" style="line-height: 35px;">
							<div class="text-muted"><?php echo htmlentities($_G['member']['username']); ?></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">充值卡密</label>
						<div class="col-sm-10">
							<input type="text" name="card_id" class="form-control">
						</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<button type="button" class="btn btn-success btn-submit ajax-post">确定充值</button>
				</div>
			</div>
		</form>
	</div>
</div>

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

</body>
</html>

