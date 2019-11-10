<?php /*a:2:{s:75:"F:\php\81sc\update\6-15\qtsc.shzmzxw\application\admin\view\user_create.php";i:1556513196;s:70:"F:\php\81sc\update\6-15\qtsc.shzmzxw\application\admin\view\layout.php";i:1556520742;}*/ ?>
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
	<div class="p-3"><form class="card" method="post" autocomplete="off" action="<?php echo url('admin/user/create'); ?>">
    <div class="card-header">创建用户</div>
    <div class="card-body">
        <div class="form-group">
            <label>用户名</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>手机号</label>
            <input type="text" name="mobile" class="form-control">
        </div>
        <div class="form-group">
            <label>邮 箱</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>最大解析次数</label>
            <input type="number" name="parse_max_times" class="form-control" value="0">
            <small class="form-text text-muted">当前账户拥有的最大解析次数，填0为无限制</small>
            <small class="form-text text-muted">此权限高于单站点解析限制权限，例如我图网最高可解析20次，但次数填写10，那么解析十次后账户便不可在解析任何站点</small>
        </div>
        <div class="form-group">
            <label>过期时间</label>
            <input type="number" name="out_time" class="form-control" value="0">
            <small class="form-text text-muted">单位小时，如果填写0，那么账户永久有效</small>
            <small class="form-text text-muted">例如：填写72，那么当该账户第一次登录时开始计算时间，72小时候过期，最大值：87600</small>
        </div>
        <div class="form-group">
            <label>账户类型</label>
            <select class="form-control" name="type">
                <option value="member" selected>会员</option>
                <option value="proxy">代理</option>
                <option value="system">管理员</option>
            </select>
            <small class="form-text text-muted">管理员可进入后台，请谨慎选择！</small>
            <small class="form-text text-muted">代理用户可在前台生成充值卡密，普通会员仅可解析资源</small>
        </div>
        <div class="form-text text-muted">日解析次数和最大解析次数填写0表示无限制，填写-1表示无权限</div>
        <div class="form-text text-muted">开启计划任务后，每日00:00会重置前日解析次数，最大解析次数是指该账号拥有这个站点的最大解析次数，除非使用充值卡充值或管理员手动调整，否则解析次数达到后就不可在解析</div>
        <?php foreach($site_list as $site): ?>
            <input type="hidden" name="site_access[<?php echo htmlentities($site['site_id']); ?>][day_used]" value="0">
            <input type="hidden" name="site_access[<?php echo htmlentities($site['site_id']); ?>][max_used]" value="0">
            <div class="form-group d-flex justify-content-between">
                <div class="my-1 mr-3 text-right" style="width: 180px;"><?php echo htmlentities($site['title']); ?></div>
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">日解析最大次数</div>
                    </div>
                    <input type="number" class="form-control" name="site_access[<?php echo htmlentities($site['site_id']); ?>][day]" placeholder="单日可解析最大次数" value="-1">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">最大解析总次数</div>
                    </div>
                    <input type="number" class="form-control" name="site_access[<?php echo htmlentities($site['site_id']); ?>][all]" placeholder="最大解析总次数" value="-1">
                </div>
            </div>
        <?php endforeach; ?>
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
