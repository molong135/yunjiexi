<?php /*a:1:{s:78:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/index/view/account_register.php";i:1556520762;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="always" name="referrer">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>用户注册-<?php echo htmlentities($_G['setting']['site_name']); ?></title>
	<base href="<?php echo htmlentities($_G['site_url']); ?>">
	<script src="static/js/jquery-3.3.1.min.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/common.css">
	<link rel="stylesheet" type="text/css" href="static/css/signin.css">
</head>
<body class="text-center">
	<?php if(!$_G['setting']['allow_register']): ?>
		<div class="form-signin">
			<div class="card">
			    <div class="card-header">阿哦~注册通道已关闭</div>
			    <div class="card-body">
			    	<p>抱歉，目前暂时关闭自助注册通道。</p>
			    	<?php if($_G['setting']['qq']): ?>
			    		<p>需要开户请联系QQ：<span class="badge badge-success"><?php echo htmlentities($_G['setting']['qq']); ?></span></p>
			    	<?php endif; ?>
			    </div>
			</div>
		</div>
	<?php else: ?>
		<form class="form-signin" autocomplete="off">
			<h1 class="h3 mb-3 font-weight-normal">用户注册</h1>
			<label for="username" class="sr-only">账号</label>
			<input type="text" id="username" class="form-control" name="username" placeholder="账号名称" required autofocus>
			<label for="password" class="sr-only">密码</label>
			<input type="password" id="password" class="form-control" name="password" placeholder="登录密码" required>
			<label for="password_confirm" class="sr-only">重复密码</label>
			<input type="password" id="password_confirm" class="form-control" name="password_confirm" placeholder="重复密码" required>
			<button class="btn btn-lg btn-success btn-block btn-submit ajax-post mt-3" type="submit">注 册</button>
			<a class="btn btn-lg btn-info btn-block" href="<?php echo url('index/account/login'); ?>">登 录</a>
			<p class="mt-5 mb-3 text-muted">&copy; 2019-2099</p>
		</form>
	<?php endif; ?>
	<script type="text/javascript" src="static/js/common.js"></script>
</body>
</html>
