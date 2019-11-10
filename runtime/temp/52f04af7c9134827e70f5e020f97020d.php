<?php /*a:4:{s:70:"/www/wwwroot/81sucai.com/application/index/view/common_showmessage.php";i:1554964166;s:58:"/www/wwwroot/81sucai.com/application/index/view/layout.php";i:1559621573;s:65:"/www/wwwroot/81sucai.com/application/index/view/public_header.php";i:1559142578;s:65:"/www/wwwroot/81sucai.com/application/index/view/public_footer.php";i:1556521458;}*/ ?>
<!DOCTYPE html>

<html style="background: #f2f2f2;">

<head>

	<meta charset="utf-8">

	<meta name="renderer" content="webkit">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content="always" name="referrer">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo htmlentities($_G['setting']['site_name']); ?></title>

	<base href="<?php echo htmlentities($_G['site_url']); ?>">

	<script src="static/js/jquery-3.3.1.min.js"></script>

	<script src="static/js/bootstrap.min.js"></script>
	<script src="static/js/lrtk.js"></script>

	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="static/css/common.css">
	<link rel="stylesheet" type="text/css" href="static/css/lrtk.css">

</head>

<body>
<!-- 代码 开始 -->
<div id="top"></div>
<!-- 代码 结束 -->

<nav class="navbar navbar-expand-lg navbar-index bg-info">
	<div class="container">
	<a class="navbar-brand" href="<?php echo htmlentities($_G['site_url']); ?>">资源解析专家</a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'index'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/index'); ?>">资源解析</a>
			</li>
			<li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/demo'); ?>">解析示例</a>
			</li><li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" href="<?php echo url('index/index/chenpian'); ?>">操作演示</a>
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
	<?php endif; 
switch ($code) {
    case -1:
        $show_class = 'error';
        break;
    case 2:
        $show_class = 'loading';
        break;
    case 1:
        $show_class = 'right';
        break;
    default:
        $show_class = 'info';
}
?>
<style type="text/css">
/*Jump*/
.system-jump-box {
    border: 0.25rem solid #c6e9ff;
    margin: 1rem 0;
}

.system-jump-message>h5>.system-jump-icon {
    font-size: 1.25rem;
    width: 1.25rem;
    height: 1.25rem;
    margin-right: 0.75rem;
}

.system-jump-right {
    background: #e2ffea;
}

.system-jump-right>h5 {
    color: #59ba74;
}

.system-jump-info {
    background: #F2F9FD;
}

.system-jump-info>h5 {
    color: #888888;
}

.system-jump-error {
    background: #fff0f0;
}

.system-jump-error>h5 {
    color: #d70000;
}

.system-jump-loading {
    background: #e8ecff;
}

.system-jump-loading>h5 {
    color: #36befa;
}
</style>
<div class="container my-5">
	<?php switch($msg): case "site_close": ?>
	        <div class="card my-5">
	            <div class="card-header">站点关闭</div>
	            <div class="card-body"><?php echo htmlentities($_G['setting']['site_close_tip']); ?></div>
	        </div>
		<?php break; case "login": ?>
	        <div class="my-5 mx-auto" style="width: 25rem">
	            <form method="post" action="<?php echo url('user/account/login'); ?>">
	                <input type="hidden" name="referer" value="<?php echo htmlentities(app('request')->url(true)); ?>">
	                <div class="card">
	                    <div class="card-header">请先登陆后再操作</div>
	                    <div class="card-body">
	                        <div class="form-group">
	                            <label>账户：</label>
	                            <input type="text" class="form-control" name="username" placeholder="邮箱/手机号/用户名" required>
	                        </div>
	                        <div class="form-group">
	                            <label>密码：</label>
	                            <input type="password" class="form-control" name="password" placeholder="账户密码" required>
	                        </div>
	                        <button class="btn btn-success d-block w-100 btn-submit ajax-post">登 陆</button>
	                    </div>
	                    <div class="card-footer clearfix">
	                        <div class="float-left">
	                            <a href="<?php echo url('user/account/forget'); ?>">忘记密码</a>
	                        </div>
	                        <div class="float-right">
	                            还没有帐号？ <a href="<?php echo url('user/account/'.$_G['setting']['register_action']); ?>">立即注册&gt;&gt;</a>
	                        </div>
	                    </div>
	                </div>
	            </form>
	        </div>
		<?php break; default: ?>
	        <div class="system-jump-box">
	            <div class="system-jump-message system-jump-<?php echo htmlentities($show_class); ?> p-3">
	                <h5>
	                    <?php switch($code): case "-1": ?><i class="adt-icon system-jump-icon icon-show-error"></i><?php break; case "2": ?><i class="adt-icon system-jump-icon icon-show-loading"></i><?php break; case "1": ?><i class="adt-icon system-jump-icon icon-show-right"></i><?php break; default: ?><i class="adt-icon system-jump-icon icon-show-info"></i>
	                    <?php endswitch; ?>
	                    <?php echo strip_tags($msg); ?>
	                </h5>
	                <?php if($code === 2): ?>
	                    <div class="progress mb-2">
	                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-100"></div>
	                    </div>
	                <?php endif; ?>
	                <div class="system-jump form-text text-muted">
	                    页面将在<b id="system-jump-wait"><?php echo htmlentities($wait); ?></b>秒后跳转，<a id="system-jump-href" href="<?php echo htmlentities($url); ?>">点击这里快速跳转</a>
	                </div>
	            </div>
	        </div>
	        <script>
                $(function(){
                    var wait = <?php echo htmlentities($wait); ?>,
                        href = $('#system-jump-href').attr('href');
                    if(parseInt(wait) <= 0){
                        location.href = href;
                    }else{
                        var interval = setInterval(function(){
                            wait--;
                            $('#system-jump-wait').html(wait);
                            if(wait <= 0) {
                                clearInterval(interval);
                                location.href = href;
                            };
                        }, 1000);
                    }
                })
	        </script>
	<?php endswitch; ?>
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

