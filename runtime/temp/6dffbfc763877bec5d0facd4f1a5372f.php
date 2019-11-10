<?php /*a:2:{s:67:"/www/wwwroot/81sucai.com/application/admin/view/site_third_edit.php";i:1556229148;s:58:"/www/wwwroot/81sucai.com/application/admin/view/layout.php";i:1556520742;}*/ ?>
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
	<div class="p-3"><form class="card" method="post" autocomplete="off" action="<?php echo url('admin/site/third_edit'); ?>">
    <?php if(!empty($third)): ?>
        <input type="hidden" name="third_id" value="<?php echo htmlentities($third['third_id']); ?>">
        <div class="card-header">编辑第三方站点</div>
    <?php else: ?>
        <div class="card-header">新增第三方站点</div>
    <?php endif; ?>
    <div class="card-body">
        <div class="form-group">
            <label>网站名称</label>
            <input type="text" name="title" class="form-control" value="<?php echo isset($third['title']) ? htmlentities($third['title']) : ''; ?>">
        </div>
        <div class="form-group">
            <label>官网地址</label>
            <input type="text" name="url" class="form-control" value="<?php echo isset($third['url']) ? htmlentities($third['url']) : ''; ?>">
        </div>
        <div class="form-group">
            <label>顶级域名</label>
            <input type="text" name="url_regular" placeholder="顶级域名" class="form-control" value="<?php echo isset($third['url_regular']) ? htmlentities($third['url_regular']) : ''; ?>">
        </div>
        <div class="form-group">
            <label>状态</label>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="status" value="1"  <?php if(empty($third) || $third['status'] == 1): ?>checked<?php endif; ?>>
                <label class="custom-control-label">启用</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="status" value="0"  <?php if(!empty($third) && $third['status'] == 0): ?>checked<?php endif; ?>>
                <label class="custom-control-label">关闭</label>
            </div>
            <small class="form-text text-muted">关闭后不用使用该站点解析</small>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-success btn-submit ajax-post">提交数据</button>
    </div>
</form>
</div>
</div>
<script type="text/javascript" src="static/js/common.js"></script>
</body>
</html>
