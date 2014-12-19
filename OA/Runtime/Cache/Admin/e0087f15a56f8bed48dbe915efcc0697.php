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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div id="content" style="margin-top:20px;margin-right:30px;">
			<div id="breadcrumb">
				<a href="index.html" title="GO TO HOME" class="tip-bottom"><i class="icon-home"></i>首页</a>
				<a class="current">修改密码</a>
			</div>
			<!----Insert start------>
			<div class="container-fluid">

				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content nopadding">
								<form action="<?php echo U('Home/User/resetpassword');?>" method="post" class="form-horizontal" onsubmit="return chkform()">
									<div class="control-group">
										<label class="control-label">原始密码</label>
										<div class="controls">
											<input type="password" name="oldpassword" id="oldpassword" required onblur="return chkpass();"/>
										</div>
									</div>                                        
                                    <div class="control-group">
										<label class="control-label">新密码</label>
										<div class="controls">
											<input type="password" name="password" required />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">确认新密码</label>
										<div class="controls">
											<input type="password" name="password2" required />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"></label>
										<div class="controls">
											<input type="submit" value="保存" class="btn btn-primary"/>
										</div>
									</div>
								</form>
									<script>
										var lock;
										function chkpass(){
											$password = $('#oldpassword').val();
											$.post("<?php echo U('Home/User/setpassword');?>",{"password":$password},function(data){
													if(data == 0) {
														alert('原密码不正确！');
	                                                    lock=0;
													}else{
														lock=1;
													}	
										    });
										}
										/*
										$(function(){
											$(':input[name=oldpassword]').blur(function(){
												$password = $(this).val();
												$.post('<?php echo U('User/setpassword');?>',{"password":$password},function(data){
													if(data == 0) {
														alert('原密码不正确！');
	                                                    lock=0;
													}else{
														lock=1;
													}	
												});	
											});
										});
										*/
										function chkform(){
											//$(':input[name=oldpassword]').trigger('change');

											//if(lock) return false;
											$password = $(':input[name=password]').val();
											$password2 = $(':input[name=password2]').val();
											if($password==''){
												alert('新密码不能为空！');
												return false;
											}
											if($password!=$password2){
												alert('两次密码输入不一致！');
												return false;
											}
											return true;
										}
										
									</script>
									
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<!----Insert end------>
			<div class="row-fluid">
				<div id="footer" class="span12">
					2014 &copy; 长沙梵天网络科技有限公司 
				</div>
			</div>
		</div>
	</body>
</html>