<?php
namespace Home\Controller;
//use Think\Controller;
use Common\Controller\InitController;
class UserController extends InitController {
    public function index(){
    	$username = $_SESSION['username'];
    	$user = M('leave');
    	$this->list = $user->where("username='{$username}'")->limit(10)->select();
    	$this->display('index');
    }

//     //验证登录是否成功
//     public function checklogin(){
//     	$db = M('member');
//     	$user = $_POST['username'];
//     	$pass = $_POST['password'];
//     	$db_pass = $db->where("username='{$user}'")->getField('password');
    	
//     	if ($db_pass == md5($pass)) {
//     		session('username',$user); 
//     		$leave = M('leave');
//     		$this->list = $leave->where("username='{$user}'")->limit(5)->select();   		
//     		$this->display('index');
//     		//print_r($list);
//     	}else {
//     		$this->error('登陆失败！',U('Login/Index'));
//     	}
    	
//      }
     
//      public function checklogin(){
//      	$db = M('member');
//      	$user = trim($_POST['username']);
//      	$pass = $_POST['password'];
//      	$db_pass = $db->where("username='{$user}'")->getField('password');
//      	if ($db_pass == md5($pass)) {
//      		session('username',$user);
//      		$leave = M('leave'); 
//      		$this->list = $leave->where("username='{$user}'")->limit(5)->select();
//      		if($user=="admin"){
//      			redirect('/?m=Admin&c=admin');
//      		}else {
//      		$this->display('index');
//      		}
//      		//print_r($list);
//      	}else {
//      		$this->error('登陆失败！',U('Login/Index'));
//      	}
     	 
//      }
//      //退出
//     public function logout(){
//     	session(null);
//     	$this->redirect('Login/index');
//     }
    //处理提交的请假单
    public function addleave(){
    	$date['username'] = $_POST['employer'];
    	$date['department'] = $_POST['department'];
    	$date['reason'] = $_POST['reason'];
    	$st = strtotime($_POST['startdate']);
    	$et = strtotime($_POST['enddate']);
    	$date['startdate'] = $st;
    	$date['enddate'] = $et;
        
    	if(M('leave')->add($date)){
    		$this->success('提交成功',U('User/index'));
    		}else {
    		echo '提交失败';
    	}
    }
    //请教申请
    public function applyleave(){
        $this->display('leave');	
    }
    
	public function chkoldpass(){
		$admin_id = $this->chkprivilege();
		$admin = M('Partner_staff');
		$pass = $admin->where(array('staff_id'=>$admin_id))->getField('password');
		if($pass == md5(I('password'))){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	//转到修改密码界面
	public function password(){
		$this->display('resetpassword');
	}
	//ajax处理提交原始密码是否正确
	public function setpassword(){
		if($_SESSION)$user = $_SESSION['username'];
		$member = M('member');
		$pass = $member->where("username = '{$user}'")->getField('password');
		if ($pass != md5(trim($_POST['password']))) {
			echo 0;
		}else {
			echo 1;
		}
	}
	//修改密码 
	public function resetpassword(){
			if(!empty($_SESSION))$user = $_SESSION['username'];
			$member = M('member');
			$oldpassword = md5(trim($_POST['oldpassword']));
			$password['password'] =md5(trim($_POST['password']));
			if ($oldpassword!=$member->where("username = '{$user}'")->getField('password')) {
				$this->error('密码修改失败',U('User/password'),3);
			}else {			
				$member->where("username = '{$user}'")->save($password);
				$this->success('密码已修改,请重新登陆！',U('Login/index'),3);
			}
		}
						

}