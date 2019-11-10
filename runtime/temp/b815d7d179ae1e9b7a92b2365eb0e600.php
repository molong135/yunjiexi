<?php /*a:5:{s:66:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\index\view\user_proxy.php";i:1555072528;s:62:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\index\view\layout.php";i:1561285086;s:69:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\index\view\public_header.php";i:1560744428;s:65:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\index\view\user_left.php";i:1555074814;s:69:"D:\WWW\sc\yc_sc\qtsc.shzmzxw\application\index\view\public_footer.php";i:1560744405;}*/ ?>
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
  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?61db4ecca754a1d3cd3dbb4ba9894eeb";
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
				<a class="nav-link" href="<?php echo url('index/index/chenpian'); ?>">操作演示</a>
			</li><li class="nav-item <?php if(app('request')->controller() == 'Index' && app('request')->action() == 'demo'): ?>active<?php endif; ?>">
				<a class="nav-link" target="_blank" href="http://pei.982ka.cn/Fast/Index.aspx">购买卡密账号</a>
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
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link <?php if(request()->param('type') != 'create_card'): ?>active<?php endif; ?>" href="<?php echo url('index/user/proxy'); ?>">我的卡密</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if(request()->param('type') == 'create_card'): ?>active<?php endif; ?>" href="<?php echo url('index/user/proxy',['type'=>'create_card']); ?>">生成卡密</a>
					</li>
				</ul>
			</div>
			<?php if(app('request')->param('type') == 'create_card'): ?>
				<form method="post" action="<?php echo url('index/user/proxy',['type'=>'create_card']); ?>">
					<div class="card-body">
				        <div class="form-group">
				            <label>生成数量</label>
				            <input type="number" name="numbers" class="form-control" value="10">
				            <div class="form-text text-muted small">当前还可生成<?php echo htmlentities($_G['setting']['proxy_card_numbers'] - $count); ?>张卡密</div>
				        </div>
				        <div class="form-group">
				            <label>延长时间</label>
				            <input type="text" name="valid_time" class="form-control">
				            <div class="form-text text-muted small">当类型为时间时此项必填，单位小时。</div>
				            <div class="form-text text-muted small">例如：此处填写72，那么会员使用该卡密后会延长账户有效期72小时（3天）</div>
				        </div>
				        <div class="form-group">
				            <label>账户解析总次数</label>
				            <input type="text" name="account_times" class="form-control">
				            <div class="form-text text-muted small">最大值：<?php echo htmlentities($_G['setting']['proxy_card_account_times']); ?></div>
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
					<div class="card-footer"><button type="button" class="btn btn-success btn-submit ajax-post">提交数据</button></div>
			    </form>
			<?php else: ?>
				<div class="card-body p-0">
			        <table class="table table-striped table-hover table-card mb-0">
			            <thead>
			                <tr>
			                    <th scope="col">卡号</th>
			                    <th width="400" scope="col">卡密功能</th>
			                    <th width="200" scope="col">充值用户</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php if(is_array($card_list) || $card_list instanceof \think\Collection || $card_list instanceof \think\Paginator): $i = 0; $__LIST__ = $card_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$card): $mod = ($i % 2 );++$i;?>
			                    <tr>
			                        <td><?php echo htmlentities($card['card_id']); ?></td>
			                        <td><?php echo $card['info']; ?></td>
			                        <td <?php if(!empty($card['use_uid'])): ?>data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo htmlentities($card['use_time']); ?>"<?php endif; ?>>
			                            <?php if(empty($card['use_uid'])): ?>
			                                未使用
			                            <?php else: ?>
			                                <?php echo htmlentities($card['use_user']['username']); ?>
			                            <?php endif; ?>
			                        </td>
			                    </tr>
			                <?php endforeach; endif; else: echo "" ;endif; ?>
			            </tbody>
			        </table>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(function(){
        $(document)
            .on('click','.show-access-times',function(){
                var access = $(this).data('access-times');
                var message = '';
                $.each(access,function(index,value){
                    message += value.title+': 日解析+'+value.day+' 总解析+'+value.all+'<br>';
                })
                dialog.alert(message, {
                    title:'站点权限',
                });
            })
    })
</script>

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

