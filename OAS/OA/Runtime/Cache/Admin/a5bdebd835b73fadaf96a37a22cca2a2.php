<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
        <title>梵天科技OA管理系统</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/Public/css/unicorn.main.css" />
		<link rel="stylesheet" href="/Public/css/unicorn.blue.css" class="skin-color" />
        <link rel="stylesheet" href="/Public/css/colorpicker.css" />
		<link rel="stylesheet" href="/Public/css/uniform.css" />
		<link rel="stylesheet" href="/Public/css/select2.css" />	
		<link rel="icon" href="/Public/img/favicon.ico" type="image/vnd.microsoft.icon">
		<script src="/Public/js/excanvas.min.js"></script>
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/bootstrap.min.js"></script>
		<script src="/Public/js/jquery.flot.min.js"></script>
		<script src="/Public/js/jquery.flot.resize.min.js"></script>
		<script src="/Public/js/jquery.peity.min.js"></script>
		<script src="/Public/js/fullcalendar.min.js"></script>
		<script src="/Public/js/unicorn.js"></script>
		<script src="/Public/js/unicorn.dashboard.js"></script>
		<script src="/Public/js/My97DatePicker/WdatePicker.js"></script>	
	</head>
	<body>
		
		<div id="header">
            <h1 style="height:55px;width:700px;top:12px;background:url('/Public/img/admin_logo.png') no-repeat scroll 0 0;"><a href="/index.php">梵天科技OA系统</a></h1>		
		</div>

		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group" >
                <li class="btn btn-inverse" style="width:170px;"><a title="" ><span class="text">admin&nbsp;&nbsp;欢迎使用OA管理系统</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/User/password');?>"><i class="icon icon-cog"></i> <span class="text">修改密码</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/User/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
            </ul>
        </div>
		<div id="sidebar">
			<ul>	
				<li><a href="<?php echo U('Admin/Admin/leave');?>"><i class="icon icon-pencil"></i> <span>考核列表</span></a></li>
                <li class="submenu"><a href="<?php echo U('Admin/business');?>"><i class="icon icon-th-list"></i> <span>业务处理</span></a>
                   <ul>
						<li><a href="<?php echo U('Admin/business');?>">申请资源</a></li>
						<li><a href="<?php echo U('Admin/nchong');?>">内冲申请</a></li>
						<li><a href="<?php echo U('Admin/jfu');?>">进服人员</a></li>
					</ul> 
				</li>
				<li><a href="<?php echo U('Admin/adduser');?>"><i class="icon icon-user"></i> <span>添加用户</span></a></li>
			</ul>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div id="content" style="margin-right:20px;margin-top:13px;">
                
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a href="#" class="current">业务处理</a>

			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>资源申请</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped" >
									<thead>
													
										<tr>
											<th>申请人</th>
											<th>请假原因</th>
											<th>请假时间</th>
											<th>申请时间</th>
											<th>状态</th>
										</tr>
									
									</thead>
									<tbody>
								<?php if(is_array($lvlist)): foreach($lvlist as $key=>$v): ?><tr>
											<td style="width:8%;" valign="center"><?php echo ($v["username"]); ?></td>
											<td  ><?php echo ($v["reason"]); ?></td>
											<td style="width:15%;">
											    <a href="#"><?php echo (date('Y-m-d H:i:s',$v["startdate"])); ?></a>&nbsp;&nbsp;到&nbsp;&nbsp;<br><a href="#"><?php echo (date('Y-m-d H:i:s',$v["enddate"])); ?></a>
											</td>
											<td style="width:10%;"><a href="#"><?php echo ($v["applydate"]); ?></a></td>
											<td style="width:8%;"><?php echo ($v["verify_status"]); ?></td>
										</tr><?php endforeach; endif; ?>
				
									</tbody>
								</table>							
							</div>
						</div>
			
				<div class="row-fluid">
					<div id="footer" class="span12">
						2014 &copy;  长沙梵天网络科技有限公司
					</div>
				</div>
			</div>
		</div>
	</body>
</html>