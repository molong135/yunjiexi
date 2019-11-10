<?php /*a:5:{s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/user_index.php";i:1572661447;s:68:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/layout.php";i:1571928042;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_top.php";i:1571930106;s:73:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_menu.php";i:1571935060;s:72:"/www/wwwroot/shucaiwang/wp.shzmzxw/application/ycont/view/common_box.php";i:1434889344;}*/ ?>
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

       <div class="card-header">我的权限 (每日凌晨00:00更新下载次数) 当前账户可解析 <?php echo $_G['member']['parse_max_times']==-1 ? '无权解析'  :  ($_G['member']['parse_max_times'] ==0 ? '无限制' : $_G['member']['parse_max_times'].'次'); ?></div>


        <div class="padding border-bottom">
             
        
        <table class="table table-hover">
        	<tr>
        		<th width="20%">使用项目</th>
        		<th width="20%">今日解析次数</th>
                <th width="20%">今日可以解析</th>
        		<th width="20%">今日以使用</th>
                <th width="20%">可以解析次数</th>
        	</tr>
              <?php $i=0; foreach($_G['member']['site_access'] as $site_id => $access): 
                        if (empty($_G['web_site'][$site_id]) || $_G['web_site'][$site_id]['status']<=0){
                            continue;
                        }
                     ?>
                    <tr>
                        <td><?php echo htmlentities($_G['web_site'][$site_id]['title']); ?> ： </td>
                        <td class="border-top-0">
                            今日已解析：<strong class="text-danger pr-3"><?php echo isset($access['day_used']) ? htmlentities($access['day_used']) : 0; ?>次</strong>
                        </td>
                        <td class="border-top-0">
                            每日可解析：<strong class="text-info pr-3"><?php echo isset($access['day']) ? htmlentities($access['day']) : 0; ?>次</strong>
                        </td>
                        <td class="border-top-0">
                            已解析：<strong class="text-danger pr-3"><?php echo isset($access['max_used']) ? htmlentities($access['max_used']) : 0; ?>次</strong>
                        </td class="border-top-0">
                        <td>
                            可解析次数：<strong class="text-info pr-3"><?php echo isset($access['all']) ? htmlentities($access['all']) : 0; ?>次</strong>
                        </td>
                    </tr>
                    <?php $i++; ?>            
            	
       
        <?php endforeach; ?>

        </table>
        <div class="panel-foot text-center">
    
        </div>

    </div>


 <!--底部 end-->
 

          <br/>
          </div>
    </div>
   


</body>
</html>
