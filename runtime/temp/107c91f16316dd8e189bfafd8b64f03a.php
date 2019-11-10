<?php /*a:2:{s:67:"D:\WWW\sc\yc_sc\wp.shzmzxw\application\admin\view\setting_email.php";i:1556324300;s:60:"D:\WWW\sc\yc_sc\wp.shzmzxw\application\admin\view\layout.php";i:1556520742;}*/ ?>
<!DOCTYPE html>
<html style="background: #f2f2f2;">
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="always" name="referrer">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>管理中心</title>
	<base href="<?php echo htmlentities($_G['site_url']); ?>">
	<script src="static/js/jquery-3.3.1.min.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/common.css">
</head>
<body>
<nav class="d-flex justify-content-between fixed-top admin-top bg-white">
	<div class="d-flex justify-content-start pl-3">
		<a class="px-3" href="<?php echo htmlentities($_G['site_url']); ?>" target="_blank">前台首页</a>
	</div>
	<div class="d-flex justify-content-end pr-3">
		<a class="px-3" href="javascript:;">欢迎您，<?php echo htmlentities($_G['member']['username']); ?></a>
		<a class="px-3" href="<?php echo url('admin/account/logout'); ?>">退出</a>
	</div>
</nav>
<div class="left-bar">
	<h5>管理中心</h5>
	<div class="left-nav">
		<a class="<?php if(app('request')->controller() == 'Index'): ?>active<?php endif; ?>" href="<?php echo url('admin/index/index'); ?>">控 制 台</a>
		<a class="<?php if(app('request')->controller() == 'Setting' && app('request')->action() == 'index'): ?>active<?php endif; ?>" href="<?php echo url('admin/setting/index'); ?>">系统设置</a>
		<a class="<?php if(app('request')->controller() == 'Setting' && app('request')->action() == 'email'): ?>active<?php endif; ?>" href="<?php echo url('admin/setting/email'); ?>">邮件设置</a>
		<a class="<?php if(app('request')->controller() == 'Setting' && app('request')->action() == 'proxy'): ?>active<?php endif; ?>" href="<?php echo url('admin/setting/proxy'); ?>">代理设置</a>
		<a class="<?php if(app('request')->controller() == 'Site'): ?>active<?php endif; ?>" href="<?php echo url('admin/site/index'); ?>">站点配置</a>
		<a class="<?php if(app('request')->controller() == 'User'): ?>active<?php endif; ?>" href="<?php echo url('admin/user/index'); ?>">会员数据</a>
		<a class="<?php if(app('request')->controller() == 'Data'): ?>active<?php endif; ?>" href="<?php echo url('admin/data/index'); ?>">附件管理</a>
		<a class="<?php if(app('request')->controller() == 'Log'): ?>active<?php endif; ?>" href="<?php echo url('admin/log/index'); ?>">解析记录</a>
		<a class="<?php if(app('request')->controller() == 'Card'): ?>active<?php endif; ?>" href="<?php echo url('admin/card/index'); ?>">充值卡密</a>
		<a class="<?php if(app('request')->controller() == 'Queue'): ?>active<?php endif; ?>" href="<?php echo url('admin/queue/index'); ?>">计划任务</a>
		<a class="<?php if(app('request')->controller() == 'Tools'): ?>active<?php endif; ?>" href="<?php echo url('admin/tools/index'); ?>">更新缓存</a>
	</div>
</div>
<div class="admin-content">
	<div class="p-3"><form class="card" method="post" action="<?php echo url('admin/setting/email'); ?>">
	<div class="card-header">基础设置</div>
	<div class="card-body">
		<div class="form-group">
			<label>邮件发送主机地址</label>
			<input type="text" class="form-control" name="setting[email_host]" value="<?php echo htmlentities($_G['setting']['email_host']); ?>">
			<small class="form-text text-muted">邮件发送主机地址，QQ邮箱为：smtp.qq.com</small>
		</div>
		<div class="form-group">
			<label>邮件端口</label>
			<input type="text" class="form-control" name="setting[email_port]" value="<?php echo htmlentities($_G['setting']['email_port']); ?>">
			<small class="form-text text-muted">一般默认为25</small>
		</div>
		<div class="form-group">
			<label>发送邮件邮箱地址</label>
			<input type="text" class="form-control" name="setting[email_username]" value="<?php echo htmlentities($_G['setting']['email_username']); ?>">
			<small class="form-text text-muted">发送邮件邮箱地址，你的QQ或网易或其他邮箱地址</small>
		</div>
		<div class="form-group">
			<label>邮箱授权码</label>
			<input type="text" class="form-control" name="setting[email_password]" value="<?php echo htmlentities($_G['setting']['email_password']); ?>">
			<small class="form-text text-muted">注意是邮箱授权码，不是登陆密码</small>
		</div>
		<div class="form-group">
			<label>邮件来源名称</label>
			<input type="text" class="form-control" name="setting[email_fromname]" value="<?php echo htmlentities($_G['setting']['email_fromname']); ?>">
			<small class="form-text text-muted">邮箱邮件来源名称</small>
		</div>
	</div>
	<div class="card-footer">
		<button type="button" class="btn btn-success btn-submit ajax-post">保存设置</button>
	</div>
</form>
</div>
</div>
<script type="text/javascript" src="static/js/common.js"></script>
</body>
</html>
