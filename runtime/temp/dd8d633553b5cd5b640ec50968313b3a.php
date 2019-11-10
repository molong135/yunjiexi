<?php /*a:2:{s:56:"E:\PHP\Wp.shzmzxw\application\admin\view\card_create.php";i:1555151960;s:51:"E:\PHP\Wp.shzmzxw\application\admin\view\layout.php";i:1556520742;}*/ ?>
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
	<div class="p-3"><form class="card" method="post" autocomplete="off" action="<?php echo url('admin/card/create'); ?>">
    <div class="card-header">充值卡密生成</div>
    <div class="card-body">
        <div class="form-group">
            <label>卡密规则</label>
            <input type="text" name="rule" class="form-control">
			<div class="form-text text-muted small">"@"代表任意随机英文字符，"#"代表任意随机数字，"*"代表任意英文或数字</div>
			<div class="form-text text-muted small">规则样本：<strong class="text-success">@@@@@#####*****</strong></div>
			<div class="form-text text-muted small">注意：规则位数过小会造成用户名生成重复概率增大，过多的重复用户名会造成用户名生成终止</div>
			<div class="form-text text-muted small">用户名规则中不能带有中文及其他特殊符号</div>
			<div class="form-text text-muted small">为了避免用户名重复，随机位数最好不要少于8位</div>
        </div>
        <div class="form-group">
            <label>生成数量</label>
            <input type="number" name="numbers" class="form-control" value="10">
            <div class="form-text text-muted small">每次生成数据建议在100以内</div>
        </div>
        <div class="form-group">
            <label>延长时间</label>
            <input type="text" name="valid_time" class="form-control">
            <div class="form-text text-muted small">为账户延长可用时间，单位小时，填写0时不增加账户会员时间，该时间对永久账户无效</div>
            <div class="form-text text-muted small">填写-1时可将账户提升至永久有效，提升后无法降权</div>
            <div class="form-text text-muted small">例如：此处填写72，那么会员使用该卡密后会延长账户有效期72小时（3天）</div>
        </div>
        <div class="form-group">
            <label>账户解析总次数</label>
            <input type="text" name="account_times" class="form-control">
            <div class="form-text text-muted small">为账户增加总解析次数,该次数对无限次账户无效</div>
            <div class="form-text text-muted small">填写0时不增加账户总解析次数，填写-1时可将账户提升为无限次下载，提升后无法降权</div>
        </div>
        <?php foreach($site_list as $site): ?>
            <div class="form-group d-flex justify-content-between">
                <div class="my-1 mr-3 text-right" style="width: 180px;"><?php echo htmlentities($site['title']); ?></div>
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">日上限</div>
                    </div>
                    <input type="number" class="form-control" name="access_times[<?php echo htmlentities($site['site_id']); ?>][day]" placeholder="每日解析上限" value="0">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">总次数</div>
                    </div>
                    <input type="number" class="form-control" name="access_times[<?php echo htmlentities($site['site_id']); ?>][all]" placeholder="总解析上限" value="0">
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
