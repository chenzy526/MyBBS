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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
		<div id="content" style="margin-right:20px;margin-top:13px;">
                
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a href="#" class="current">请假列表</a>
				<a href="<?php echo U('Home/User/applyleave');?>" style="float:right;margin-right:90px;"><button >申请请假单</button></a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>请假列表</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped">
									<thead>
													
										<tr>
											<th>请假原因</th>
											<th>请假时间</th>
											<th>状态</th>
											<th>申请时间</th>
										</tr>
									
									</thead>
									<tbody>
									<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
											<td><?php echo ($v["reason"]); ?></td>
											<td><?php echo (date('Y-m-d H:i:s',$v["startdate"])); ?> 到 <?php echo (date('Y-m-d H:i:s',$v["enddate"])); ?></td>
											<td style="color:red;"><?php echo ($v["verify_status"]); ?></td>
											<td><?php echo ($v["applydate"]); ?></td>
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