<?php /*a:2:{s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/admin/view/queue_index.php";i:1556048162;s:68:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/admin/view/layout.php";i:1556520742;}*/ ?>
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
	<div class="p-3"><div class="card">
    <div class="card-header d-flex justify-content-between">
        <div >系统计划任务 - 系统自动化任务</div> <a class="btn btn-primary btn-sm" href="<?php echo url('admin/queue/reset'); ?>">重置所有任务</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover table-card mb-0">
            <thead>
                <tr>
                    <th scope="col">名称</th>
                    <th scope="col">执行文件</th>
                    <th scope="col">队列名</th>
                    <th scope="col">最后执行</th>
                    <th scope="col">下次执行</th>
                    <th scope="col">已执行次数</th>
                    <th scope="col">状态</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($queue_list) || $queue_list instanceof \think\Collection || $queue_list instanceof \think\Paginator): $i = 0; $__LIST__ = $queue_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$queue): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo htmlentities($queue['title']); ?></td>
                        <td><?php echo htmlentities($queue->payload->job); ?></td>
                        <td><?php echo htmlentities($queue['queue']); ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$queue['reserved_at']); ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$queue['available_at']); ?></td>
                        <td><?php echo htmlentities($queue['attempts']); ?></td>
                        <td><?php echo htmlentities($queue['status_text']); ?></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($page): ?>
        <div class="card-footer"><?php echo $page; ?></div>
    <?php endif; ?>
</div>
</div>
</div>
<script type="text/javascript" src="static/js/common.js"></script>
</body>
</html>
