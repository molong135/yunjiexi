<?php /*a:5:{s:75:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/user_password.php";i:1571934836;s:68:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/layout.php";i:1571928042;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_top.php";i:1571930106;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_menu.php";i:1571935060;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_box.php";i:1434889344;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-后台管理</title>
    <link rel="stylesheet" href="/static/yifile/css/pintuer.css">
    <link rel="stylesheet" href="/static/yifile/css/admin.css">

    <script src="/static/yifile/js/jquery.js"></script>
    <script src="/static/yifile/js/pintuer.js"></script>
    <script src="/static/yifile/js/respond.js"></script>
    <script src="/static/yifile/js/admin.js"></script>
    <style type="text/css">
	.alert-success {
	    color: #155724;
	    background-color: #d4edda;
	    border-color: #c3e6cb;
	}
	.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
	}
	.text-danger {
	    color: #dc3545!important;
	}
	.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
	}
	.text-info {
    color: #17a2b8!important;
}
    </style>
</head>



<body>
<div class="lefter">
    <div class="logo"><a href="/console/index"><img src="/static/yifile/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
              
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="index.html" class="icon-home"> 个人中心</a>


                <ul>
                  <li id="shubiao"><a href="<?php echo url('ycont/user/index'); ?>">个人中心</a></li>
                  <li id="shubiao"><a href="<?php echo url('ycont/user/recharge'); ?>">账户充值</a></li>
                  <li id="shubiao"><a href="<?php echo url('ycont/user/download'); ?>">解析记录</a></li>
                  <li id="shubiao"><a href="<?php echo url('ycont/user/password'); ?>">修改密码</a></li>
    
                </ul>
                </li>
                
            </ul>
        </div>
        <div class="admin-bread">
            <span>
        <?php if($_G['uid']): ?>
      
          
            <?php echo htmlentities($_G['member']['username']); if($_G['member']['type'] == 'system'): ?>
              (管理员)
            <?php else: if($_G['member']['out_time'] == 0): ?>
                (永久有效)
              <?php elseif($_G['member']['out_time'] > 0 && $_G['member']['out_time'] <= request()->time()): ?>
                (已过期)
              <?php else: ?>
                (<?php echo date('Y-m-d H:i',$_G['member']['out_time']); ?>)
              <?php endif; ?>
            <?php endif; else: ?>
       你没有登录
 
      <?php endif; ?>
            </span>

        </div>
    </div>
</div>
<!--内容页-->
<div class="admin">
    <div class="line-big">
        
      

  <div class="panel admin-panel">
        <div class="panel-head"><strong>修改密码</strong></div>


                </div>
                <div class="form-group">
                    <div class="label"><label for="password">当前密码</label></div>
                    <div class="field">
                        <input type="password" class="input oldpassword"  name="oldpassword" size="20" placeholder="当前密码" />
                    </div>
                     <div class="label"><label for="password">新密码</label></div>
                    <div class="field">
                        <input type="password" class="input password"  name="password" size="20" placeholder="新密码" />
                    </div>
                     <div class="label"><label for="password">重复密码</label></div>
                    <div class="field">
                        <input type="password" class="input password_confirm"  name="password_confirm" size="20" placeholder="重复密码" />
                    </div>
                    <i style="color:red;" id="tsxx"> </i>
                </div>
                <div class="form-button user_register" align="center" ><button class="button bg-main" type="submit" id="sure">确定修改</button></div>

<script>
    $('body').on('click','.user_register',function () {
         $("#tsxx").hide();
        oldpassword = $('.oldpassword').val();
        password = $('.password').val();
        password_confirm = $('.password_confirm').val();

        $.post("<?php echo url('ycont/user/password'); ?>",{oldpassword:oldpassword,password:password,password_confirm:password_confirm},function (r) {
            if(r.code==1){
                alert('修改成功');
                window.location.href="<?php echo url('ycont/user/index'); ?>"
            }else{
               $("#tsxx").show();
                $("#tsxx").html(r.msg);
            }
            return false
        },'json')
    })
</script>

          <br/>
          </div>
    </div>
   


</body>
</html>
