<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
        <title>梵天科技OA系统</title>
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
            <h1 style="height:55px;width:700px;top:12px;"><a href="/index.php">梵天科技OA系统</a></h1>		
		</div>

		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group" >
                <li class="btn btn-inverse" style="width:170px;"><a title="" ><span class="text" style="font-size:12px;"><?php echo $_SESSION['username'];?>&nbsp;&nbsp;欢迎使用OA系统</span></a></li>
             
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/User/password');?>"><i class="icon icon-cog"></i> <span class="text" style="font-size:12px;">修改密码</span></a></li>

                <li class="btn btn-inverse"><a title="" href="<?php echo U('Home/Login/logout');?>"><i class="icon icon-share-alt"></i> <span class="text" style="font-size:12px;">退出</span></a></li>
            </ul>
        </div>
		<div id="sidebar">
			<ul style="display: block;">	
				<li><a href="<?php echo U('User/applyleave');?>"><i class="icon icon-pencil"></i> <span>请假申请</span></a></li>
                <li class="submenu">
                    <a href="<?php echo U('Apply/resouse');?>"><i class="icon icon-th-list"></i> <span>业务申请</span></a>
					<ul>
						<li><a href="<?php echo U('Apply/resouse');?>">申请资源</a></li>
						<li><a href="<?php echo U('Apply/nchong');?>">内充申请</a></li>
						<li><a href="<?php echo U('Apply/jfu');?>">进服人员</a></li>
					</ul>
				</li>
			</ul>
			<script type="text/javascript">
			    $(function(){
			    	
			    });
			</script>
		</div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
		
		<div id="content" style="margin-top:50px;margin-right:30px;">
			<div id="content-header" style="background:#ddd;border-bottom:1px solid #fff;">
				<h1 >请假申请</h1>
			
			</div>
			<div id="breadcrumb">
				<a href="<?php echo U('Home/User/index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a class="tip-bottom">请假单</a>
				<!-- <a href="#" class="current">Common elements</a> -->
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content nopadding">
								<form action="<?php echo U('User/addleave');?>" method="post" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">申请人：</label>
										<div class="controls">
											<input type="text" name="employer" value="<?php echo $_SESSION['username'];?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">所在的部门：</label>
										<div class="controls">
											<input type="text" name="department" required/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">请假原因：</label>
										<div class="controls">
											<textarea placeholder="500字以内" name="reason" maxlength="500" required></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">请假时间：</label>
										<div class="controls">											
										
										<div class="short" style="width:212px;" >
                                            <input required="required" type="text" name="startdate"  placeholder="开始时间" class="datepicker" id="datepicker1" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>   
                                        </div>
										<label class="control-label" style="width:30px;">&nbsp;&nbsp;至：&nbsp;&nbsp;</label>
										<div class="short" style="width:212px;">
                                            <input required="required" type="text" name="enddate"  placeholder="结束时间" class="datepicker" id="datepicker2" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>   
                                        </div>
                                        
									    </div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">提交申请</button>
									</div>
								</form>
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