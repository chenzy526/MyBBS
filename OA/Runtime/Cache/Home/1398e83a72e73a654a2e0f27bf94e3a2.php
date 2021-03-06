<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>梵天科技OA系统</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/Public/css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo" style="height:250px">
            <!-- <img src="#" alt="" /> -->
        </div>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo U('Login/checkLogin');?>" method="post">
				<p style="font:18px 微软雅黑;">梵天科技OA系统</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="请输入登录帐号" required autofocus name="username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="请输入密码" required name="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="登录" /></span>
                </div>
            </form>

        </div>
        
        <script src="/Public/js/jquery.min.js"></script>  
        <script src="/Public/js/unicorn.login.js"></script> 
    </body>
</html>