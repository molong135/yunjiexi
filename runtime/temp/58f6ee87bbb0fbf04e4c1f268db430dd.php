<?php /*a:5:{s:75:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/user_download.php";i:1571935348;s:68:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/layout.php";i:1571928042;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_top.php";i:1571930106;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_menu.php";i:1571935060;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_box.php";i:1434889344;}*/ ?>
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
        
      


 <!--菜单 end-->


    <div class="panel admin-panel">
    	<div class="panel-head"><strong>个人中心</strong></div>
        <?php if($_G['member']['out_time'] > 0): if($_G['member']['out_time'] <= request()->time()): ?>
                <div class="alert alert-danger">您的账号已于 <strong><?php echo date('Y-m-d H:i',$_G['member']['out_time']); ?></strong> 过期，无法继续解析素材，请联系管理员！</div>
            <?php else: ?>
                <div class="alert alert-success">您的账号有效期至： <strong><?php echo date('Y-m-d H:i',$_G['member']['out_time']); ?></strong> 当前可正常解析素材</div>
            <?php endif; elseif($_G['member']['out_time'] == 0 && $_G['member']['type'] != 'system'): ?>
            <div class="alert alert-success">您的账号为永久会员，当前可正常解析素材</div>
        <?php endif; ?>

       <div class="card-header">解析记录 (可查看最近二十条解析记录)</div>


        <div class="padding border-bottom">
     	<?php if($log_list->isEmpty()): ?>
					<div class="p-5 text-center text-muted display-1">暂无记录</div>
		<?php else: ?>   
        
        <table class="table table-hover">
        	<tr>
        		<th width="20%">源网站</th>
        		<th width="20%">解析地址</th>
                <th width="20%">解析时间</th>
        		<th width="20%">消耗次数</th>
                <th width="20%">状态</th>
        	</tr>
            <?php if(is_array($log_list) || $log_list instanceof \think\Collection || $log_list instanceof \think\Paginator): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
				<tr>
					<td align="right"><?php echo htmlentities($log['website']['title']); ?></td>
					<td><?php echo htmlentities($log['parse_url']); ?></td>
					<td><?php echo htmlentities($log['create_time']); ?></td>
					<td><?php echo htmlentities($log['times']); ?></td>
					<td><?php echo htmlentities($log['status_text']); ?></td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>

	    </table>
        <?php endif; ?>

        <div class="panel-foot text-center">
    
        </div>

    </div>


 <!--底部 end-->
 

          <br/>
          </div>
    </div>
   


</body>
</html>
