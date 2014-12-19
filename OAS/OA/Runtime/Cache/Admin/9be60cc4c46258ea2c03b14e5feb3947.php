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
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/excanvas.min.js"></script>
		
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
                <li class="btn btn-inverse" ><a title="" ><span class="text" style="font-size:12px;">admin&nbsp;&nbsp;欢迎使用OA管理系统</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Admin/Admin/password');?>"><i class="icon icon-cog"></i> <span class="text" style="font-size:12px;">修改密码</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/Login/logout');?>"><i class="icon icon-share-alt"></i> <span class="text" style="font-size:12px;">退出</span></a></li>
            </ul>
        </div>
		<div id="sidebar">
			<ul>	
				<li><a href="<?php echo U('Admin/Admin/leave');?>"><i class="icon icon-pencil"></i> <span>考核列表</span></a></li>
                <li class="submenu"><a href="<?php echo U('Admin/business');?>"><i class="icon icon-th-list"></i> <span>业务处理</span></a>
                   <ul>
						<li><a href="<?php echo U('Admin/resouce');?>">资源申请处理</a></li>
						<li><a href="<?php echo U('Admin/nchong');?>">内充申请处理</a></li>
						<li><a href="<?php echo U('Admin/jfu');?>">进服人员查看</a></li>
					</ul> 
				</li>
				<li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>用户设置</span></a>
				    <ul>
					    <li><a href="<?php echo U('Admin/adduser');?>">添加用户</a></li>
					    <li><a href="<?php echo U('Admin/userlist');?>">查看用户列表</a></li>
				    </ul>
			    </li>
			</ul>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div id="content" style="margin-right:20px;margin-top:13px;">
                
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a href="#" class="current">审核状态</a>
				<a href="<?php echo U('Admin/index');?>" style="float:right;margin-right:90px;"><button >返回操作界面</button></a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>审核列表</h5>
							</div>
							<style>
							   .short{margin-left:0;width:150px;}
							</style>
							<div class="widget-content nopadding search">
							    <form class="form-horizontal" action="<?php echo U('Admin/leave');?>" method="POST">
							        <div class="control-group">
								        <label class="control-label">申请人：</label>
									        <div class="short">
									            <input type="text"  name="username"/>
								            </div>
								            <!--  
								            <label class="control-label">区服：</label>
									        <div class="short">
									            <input type="text"  name="district_id"/>
								            </div>
								            
								            <label class="control-label">游戏帐号：</label>
									        <div class="short">
									            <input type="text"  name="game_name"/>
								            </div>
								            -->
								            <div class="short">
									            <button class="btn btn-default" type="submit">查询</button>
								            </div>
                                            
							        </div>
							        
							    </form>
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
											<th>操作</th>
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
											<td><a href="<?php echo U('Admin/Admin/delleavelist',array('id' => $v[id]));?>">删除</a></td>
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