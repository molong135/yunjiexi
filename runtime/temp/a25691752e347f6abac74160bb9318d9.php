<?php /*a:2:{s:58:"E:\PHP\Wp.shzmzxw\application\admin\view\setting_index.php";i:1571645466;s:51:"E:\PHP\Wp.shzmzxw\application\admin\view\layout.php";i:1556520742;}*/ ?>
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
	<div class="p-3"><script type="text/javascript" src="static/js/summernote.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/css/summernote.css">
<form class="card" method="post" action="<?php echo url('admin/setting/index'); ?>">
	<div class="card-header">基础设置</div>
	<div class="card-body">
		<div class="form-group">
			<label>网站名称</label>
			<input type="text" class="form-control" name="setting[site_name]" value="<?php echo htmlentities($_G['setting']['site_name']); ?>">
			<small class="form-text text-muted">将显示在浏览器窗口标题等位置</small>
		</div>
        <div class="form-group">
            <label>网站关键词</label>
            <input type="text" class="form-control" name="setting[keywords]" value="<?php echo htmlentities($_G['setting']['keywords']); ?>">
            <small class="form-text text-muted">SEO-网站关键词</small>
        </div>

        <div class="form-group">
            <label>网站描述词</label>
            <input type="text" class="form-control" name="setting[description]" value="<?php echo htmlentities($_G['setting']['description']); ?>">
            <small class="form-text text-muted">SEO-网站描述词</small>
        </div>

		<div class="form-group">
			<label>管理员QQ</label>
			<input type="text" class="form-control" name="setting[qq]" value="<?php echo htmlentities($_G['setting']['qq']); ?>">
			<small class="form-text text-muted">作为系统发邮件的时候的发件人地址</small>
		</div>
		<div class="form-group">
			<label>pc网站页脚内容</label>
            <textarea class="form-control" id="editor" name="setting[footer]"><?php echo htmlentities($_G['setting']['footer']); ?></textarea>
			<small class="form-text text-muted">网站页脚内容,支持自定义HTML</small>
		</div>
		<div class="form-group" style="width:30%;">
			<label>移动端网站页脚内容</label>
            <textarea class="form-control" id="editor_mobile" name="setting[mobile_cont]"><?php echo htmlentities($_G['setting']['mobile_cont']); ?></textarea>
			<small class="form-text text-muted">网站页脚内容,支持自定义HTML</small>
		</div>
		<div class="form-group">
			<label>阿里云OSS AccessKeyId</label>
			<input type="text" class="form-control" name="setting[AccessKeyId]" value="<?php echo htmlentities($_G['setting']['AccessKeyId']); ?>">
			<small class="form-text text-muted">如果不启用OSS存储则该项可不填</small>
		</div>
		<div class="form-group">
			<label>阿里云OSS AccessKeySecret</label>
			<input type="text" class="form-control" name="setting[AccessKeySecret]" value="<?php echo htmlentities($_G['setting']['AccessKeySecret']); ?>">
			<small class="form-text text-muted">如果不启用OSS存储则该项可不填</small>
		</div>
		<div class="form-group">
			<label>阿里云OSS Endpoint</label>
			<input type="text" class="form-control" name="setting[Endpoint]" value="<?php echo htmlentities($_G['setting']['Endpoint']); ?>">
			<small class="form-text text-muted">如果不启用OSS存储则该项可不填</small>
		</div>
		<div class="form-group">
			<label>阿里云OSS Bucket</label>
			<input type="text" class="form-control" name="setting[Bucket]" value="<?php echo htmlentities($_G['setting']['Bucket']); ?>">
			<small class="form-text text-muted">如果不启用OSS存储则该项可不填</small>
		</div>
		<div class="form-group">
			<label>解析间隔时间</label>
			<input type="text" class="form-control" name="setting[parse_between_time]" value="<?php echo htmlentities($_G['setting']['parse_between_time']); ?>">
			<small class="form-text text-muted">同一用户两次解析间隔时间，单位秒，建议值60</small>
		</div>
		<div class="form-group">
			<label>开启网站</label>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="setting[site_open]" value="1" <?php if($_G['setting']['site_open']): ?>checked<?php endif; ?>>
				<label class="custom-control-label">启用网站</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="setting[site_open]" value="0" <?php if(!$_G['setting']['site_open']): ?>checked<?php endif; ?>>
				<label class="custom-control-label">关闭网站</label>
			</div>
			<small class="form-text text-muted">暂时将站点关闭，其他人无法访问，但不影响管理员访问</small>
		</div>
		<div class="form-group">
			<label>允许注册新用户</label>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="setting[allow_register]" value="1" <?php if($_G['setting']['allow_register']): ?>checked<?php endif; ?>>
				<label class="custom-control-label">允许注册</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="setting[allow_register]" value="0" <?php if(!$_G['setting']['allow_register']): ?>checked<?php endif; ?>>
				<label class="custom-control-label">禁止注册</label>
			</div>
			<small class="form-text text-muted">关闭注册后用户无法在前台自行注册</small>
		</div>
		<div class="form-group">
			<label>调试模式</label>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="app_debug" value="1" <?php if(config('app.app_debug') == true): ?>checked<?php endif; ?>>
				<label class="custom-control-label">开启调试模式</label>
			</div>
			<div class="custom-control custom-radio">
				<input type="radio" class="custom-control-input" name="app_debug" value="0" <?php if(config('app.app_debug') == false): ?>checked<?php endif; ?>>
				<label class="custom-control-label">关闭调试模式</label>
			</div>
			<small class="form-text text-muted">如果你不知道该功能的作用，请选择关闭调试模式，由于服务器原因该项设置可能不是即时生效，更改后请等待</small>
		</div>
	</div>
	<div class="card-footer">
		<button type="button" class="btn btn-success btn-submit ajax-post">保存设置</button>
	</div>
</form>
<script type="text/javascript">
    $(function(){
        $('#editor').summernote({
            tabsize: 2,
            height: 400
        });
    })
    $(function(){
        $('#editor_mobile').summernote({
            tabsize: 2,
            height: 550
        });
    })
</script>
</div>
</div>
<script type="text/javascript" src="static/js/common.js"></script>
</body>
</html>
