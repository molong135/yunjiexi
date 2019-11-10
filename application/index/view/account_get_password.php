<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="always" name="referrer">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>密码找回-{$_G['setting']['site_name']}</title>
	<base href="{$_G['site_url']}">
	<script src="static/js/jquery-3.3.1.min.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/common.css">
	<link rel="stylesheet" type="text/css" href="static/css/signin.css">
</head>
<body class="text-center">
	<form class="form-signin" autocomplete="off">
		<h1 class="h3 mb-3 font-weight-normal">自助找回密码</h1>
		<label for="email" class="sr-only">绑定邮箱</label>
		<input type="text" id="email" class="form-control" name="email" placeholder="绑定的邮箱地址" required autofocus>
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="verify_code" placeholder="验证码">
			<div class="input-group-append get-verify-code" style="cursor: pointer;user-select: none;">
				<span class="input-group-text">获取验证码</span>
			</div>
		</div>
		<button class="btn btn-lg btn-success btn-block btn-submit ajax-post mt-3" type="submit">验证并重置密码</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2019-2099</p>
	</form>
	<script type="text/javascript" src="static/js/common.js"></script>
	<script>
		$(function(){
			$(document)
				.on('click','.get-verify-code',function(){
					if($(this).hasClass('disabled')){
						return false;
					}
					var email = $('input[name="email"]').val();
					if(!email){
						return dialog.msg('请输入绑定邮箱');
					}
					$('.get-verify-code').addClass('disabled').find('span').html('发送中');
					$.post(
						'{:url('index/account/get_verify_code')}',
						{email:email},
						function(s){
							$('.get-verify-code').removeClass('disabled').find('span').html(s.code == 1 ? '发送成功' : '发送失败');
							dialog.msg(s);
						},
						'json'
					)
				})
		})
	</script>
</body>
</html>
