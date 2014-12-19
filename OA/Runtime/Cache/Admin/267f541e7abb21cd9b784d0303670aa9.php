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
                <li class="btn btn-inverse" style="width:170px;"><a title="" ><span class="text">admin&nbsp;&nbsp;欢迎使用OA管理系统</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Admin/Admin/password');?>"><i class="icon icon-cog"></i> <span class="text">修改密码</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/Login/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div id="content" style="margin-top:50px;margin-right:30px;">
			<div id="content-header" style="background:#ddd;border-bottom:1px solid #fff;">
				<h1 >添加用户</h1>
			
			</div>
			<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a class="tip-bottom">用户信息表</a>
				<!-- <a href="#" class="current">Common elements</a> -->
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content nopadding">
								<form action="<?php echo U('Admin/runadduser');?>" method="post" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">真实姓名：</label>
										<div class="controls">
											<input type="text" name="real_name" required placeholder="员工的真实姓名"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">登录帐号：</label>
										<div class="controls">
											<input type="text" name="username" required placeholder="真实姓名的首字母拼音（小写）"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">登录密码：</label>
										<div class="controls">
											<input type="password" id="password" name="password" required/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">确定密码：</label>
										<div class="controls">
											<input type="password" id="repassword" name="repassword" required onblur="return chkpass();"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">员工工号：</label>
										<div class="controls">
											<input type="text" name="work_id" required/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">所在部门：</label>
										<div class="controls">
											<input type="text" name="department" required maxlength="20"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">工作职位：</label>
										<div class="controls">
											<input type="text" name="position" required maxlength="16"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">入职日期：</label>
										<div class="controls">
											<input type="text" name="entrytime" required onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">性　　别：</label>
										<div class="controls">
											<select name="sex">
											    <option>男</option>
											    <option>女</option>
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">保存</button>
									</div>
								</form>
								<script type="text/javascript">
								    
								    function chkpass(){
								    	var $pass = $('#password').val();
									    var $repass = $('#repassword').val();
								    	if($pass!=$repass){
								    		alert('两次密码不相同');
								    		return false;
								    	}
								    
								    }
								</script>
							</div>
						</div>						
					</div>
				</div>

				<div class="row-fluid">
					<div id="footer" class="span12">
						2014 &copy; 长沙梵天网络科技有限公司
					</div>
				</div>
			</div>
		</div>
	</body>
</html>