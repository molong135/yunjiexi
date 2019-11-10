<?php /*a:2:{s:63:"/www/wwwroot/81sucai.com/application/admin/view/user_export.php";i:1557355396;s:58:"/www/wwwroot/81sucai.com/application/admin/view/layout.php";i:1557355396;}*/ ?>
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
		<a class="px-3 text-danger upgrade-cms d-none" href="<?php echo url('admin/tools/check_version'); ?>">更新程序</a>
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
	<div class="p-3"><form method="post" data-after="export_user">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        导出会员
    </div>
    <div class="card-body">
        <div class="form-group">
            <?php foreach($field_list as $i=>$field): ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="fields[]" id="field_<?php echo htmlentities($i); ?>" value="<?php echo htmlentities($field['Field']); ?>">
                <label class="custom-control-label" for="field_<?php echo htmlentities($i); ?>"><?php echo htmlentities($field['Comment']); ?></label>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <label>文件储存名称</label>
            <input type="text" name="filename" class="form-control" placeholder="例如：黄金用户">
        </div>
        <div class="form-group">
            <label>账户类型</label>
            <select class="form-control" name="user_type">
                <option value="all" selected>会员</option>
                <option value="member">会员</option>
                <option value="proxy">代理</option>
                <option value="system">管理员</option>
            </select>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="my-1 mr-3 text-right" style="width: 200px;">注册时间范围</div>
            <div class="input-group mr-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">开始时间</div>
                </div>
                <input type="text" class="form-control" name="start_time" value="0或不填为不限制">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">结束时间</div>
                </div>
                <input type="text" class="form-control" name="end_time" value="0或不填为不限制">
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="my-1 mr-3 text-right" style="width: 200px;">UID范围</div>
            <div class="input-group mr-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">开始UID</div>
                </div>
                <input type="number" class="form-control" name="start_uid" placeholder="0或不填为不限制">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">结束UID</div>
                </div>
                <input type="number" class="form-control" name="end_uid" placeholder="0或不填为不限制">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-info btn-submit ajax-post" type="submit">导出符合条件的会员</button>
    </div>
</div>
</form>
<script type="text/javascript">
    function export_user(form,s,btn){
        console.log(s);
        window.location.href = s.url;
        return false;
    }
</script>
</div>
</div>
<script type="text/javascript" src="static/js/common.js"></script>
<script type="text/javascript">
	$(function(){
		$.ajax({
			url:'<?php echo url('admin/index/check'); ?>',
			dataType:'json',
			success:function(s){
				if(s.has_new == 1){
					if($('.version').length>0){
						$('.version').after('<a class="pl-3 text-success" href="<?php echo url('admin/tools/check_version'); ?>">发现新版本：'+s.version+'，点击更新程序</a>');
					}
					if($('.upgrade-log').length>0){
						$('.upgrade-log').removeClass('d-none').html(s.upgrade_log);
					}
					$('.upgrade-cms').removeClass('d-none').html('发现新版本：'+s.version+'，点击更新程序');
				}
			}
		})
	})
</script>
</body>
</html>
