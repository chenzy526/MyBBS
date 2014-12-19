<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	
    	$this->display('login');
    }
    //验证登录是否成功
    public function checklogin(){
    	$db = M('member');
    	$user = trim($_POST['username']);
    	$pass = $_POST['password'];
    	$db_pass = $db->where("username='{$user}'")->getField('password');
    	if ($db_pass == md5($pass)) {
    		session('username',$user);
    		$leave = M('leave');
    		$this->list = $leave->where("username='{$user}'")->limit(10)->select();
    		if($user=="admin"){
    			redirect('/?m=Admin&c=admin');
    		}else {
    			$this->display('index');
    		}
    		//print_r($list);
    	}else {
    		$this->error('登陆失败！',U('Login/Index'));
    	}    	 
    }
    //退出
    public function logout(){
    	session(null);
    	$this->redirect('Login/index');
    }
//     //转到修改密码界面
//     public function password(){
//     	$this->display('resetpassword');
//     }
//     //ajax处理提交原始密码是否正确
//     public function setpassword(){
//     	$user = !empty($_SESSION)?$_SESSION['username']:null;
//     	echo $user;die;
//     	//if($_SESSION)$user = $_SESSION['username'];
//     	$member = M('member');
//     	$pass = $member->where("username = '{$user}'")->getField('password');
//     	if ($pass != md5(trim($_POST['password']))) {
//     		echo 0;
//     	}else {
//     		echo 1;
//     	}
//     }
//     //修改密码
//     public function resetpassword(){
//     	$user = !empty($_SESSION)?$_SESSION['username']:null;
//     	$member = M('member');
//     	$oldpassword = md5(trim($_POST['oldpassword']));
//     	$password['password'] =md5(trim($_POST['password']));
//     	if ($oldpassword!=$member->where("username = '{$user}'")->getField('password')) {
//     		$this->error('密码修改失败',U('User/password'),3);
//     	}else {
//     		$member->where("username = '{$user}'")->save($password);
//     		$this->success('密码已修改,请重新登陆！',U('Login/index'),3);
//     	}
//     }
    
}