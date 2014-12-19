<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Common\Controller\InitController;
//use Think\Controller;
class AdminController extends InitController {
    public function index(){
	    //echo '这里是admin';
    	$db = M('leave');
    	//print_r($leavelist);
    	$this->lvlist = $db->where('status=0')->select();
	    $this->display('index');
    }
    //操作处理方法
    public function rundo(){
    	
    }
    //展示请假处理列表界面
    public function leave(){
//     	$db = M('leave');
//     	$this->lvlist = $db->where('status!=0')->select();
//     	$this->display('leavelist');
    	$db = M('leave');
    	$map['username'] = trim(I('username'));
    	!empty($map['username'])?$map['username']:null;
    	if(empty($map['username'])){ 
    		//$this->userlist = $db->order('entrytime desc')->limit($page->firstRow.','.$page->listRows)->select();
    		$this->lvlist = $db->order('applydate desc')->where('status!=0')->select();
    	}else {
    		$this->lvlist = $db->order('applydate desc')->where('status!=0')->where($map)->select();
    	  }
    		$this->display('leavelist');
    	}
    
    //批准请假申请
    public function doleave(){
    	//echo "同意请假申请";
    	$data['status'] = I('status');
    	$data['verify_status'] = '批准';
    	$map['id'] = I('id');
    	$db = M('leave');
    	if ($db->where($map)->save($data)) {
    		$this->success('操作成功',U('Admin/index'));
    	}else {
    		$this->error('操作失败');
    	}
     }
     //删除请假列表中的某条记录
     public function delleavelist(){
     	$id = I('id');
     	$db = M('leave');
     	if ($db->where(array('id' => $id))->delete()) {
     		$this->success('删除成功',U('Admin/leave'));
     	}else {
     		$this->error('删除失败');
     	}
     }
     
    //不批准请假申请
    public function notleave(){
    	//echo "不同意你的请假申请";
    	$data['status'] = I('status');
    	$data['verify_status'] = '不批准';
    	$map['id'] = I('id');
    	$db = M('leave');
    	if ($db->where($map)->save($data)) {
    		$this->success('操作成功',U('Admin/index'));
    	}else {
    		$this->error('操作失败');
    	}
    }
    

    //显示用户列表
    public function userlist(){
//     	$db = M('member');
//      $this->userlist = $db->select();
//     	$this->display('userlist');
    	$db = M('member');
    	import('ORG.Util.Page');
    	$count = $db->where("username!='admin'")->count();
    	$map['real_name'] = trim(I('real_name'));
    	!empty($map['real_name'])?$map['real_name']:null;
    	$uer['username'] = trim(I('username'));
    	!empty($uer['username'])?$uer['username']:null;
    	$dis['work_id'] = trim(I('work_id'));
    	!empty($dis['work_id'])?$dis['work_id']:null;
    	 
    	if(!($map['real_name']||$uer['username']||$dis['work_id'])){
    		 
    		//实例化page类
    		$page = new \Think\Page($count);
    		//$page = new \Page($count);
    		//分页显示输出
    		$show = $page->show();
    		$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->limit($page->firstRow.','.$page->listRows)->select();
    	
    	}else {
    		if($map['real_name']){
    			$count = $db->where($map)->count();
    			//实例化page类
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
    			}else{
    				$count = $db->where("username!='admin'")->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($uer['username']){
    			$count = $db->where($uer)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where("username!='admin'")->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($dis['work_id']){
    			$count = $db->where($dis)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where("username!='admin'")->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->userlist = $db->where("username!='admin'")->order('entrytime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}
    	}
    	$this->assign('page',$show);
    	$this->display('userlist');
    	
    }
    //显示处理资源申请界面
    public function resouce(){
    	
    	$db = M('resources');
    	import('ORG.Util.Page');
    	$count = $db->count();
    	$map['plateform'] = trim(I('plateform'));
    	!empty($map['plateform'])?$map['plateform']:null;
    	$uer['game_name'] = trim(I('game_name'));
    	!empty($uer['game_name'])?$uer['game_name']:null;
    	$dis['district_id'] = trim(I('district_id'));
    	!empty($dis['district_id'])?$dis['district_id']:null;
    	
    	if(!($map['plateform']||$uer['game_name']||$dis['district_id'])){
	    		
	      	//实例化page类
	      	$page = new \Think\Page($count);
	      	//$page = new \Page($count);
	      	//分页显示输出
	      	$show = $page->show();
	      	$this->resoucelist = $db->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
	      	
    	}else {
      		if($map['plateform']){
      			$count = $db->where($map)->count();
      			//实例化page类
      			$page = new \Think\Page($count);
      			//分页显示输出
      			$show = $page->show();
      			if($count){
      			$this->resoucelist = $db->order('apply_time desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
      			}else{
      				$count = $db->count();
      				$page = new \Think\Page($count);
      				$show = $page->show();
      				$this->resoucelist = $db->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
      			} 
      		}elseif ($uer['game_name']){
      			$count = $db->where($uer)->count();
      			$page = new \Think\Page($count);
      			//分页显示输出
      			$show = $page->show();
      			if($count){
      			$this->resoucelist = $db->order('apply_time desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
      			}else {
      				$count = $db->count();
      				$page = new \Think\Page($count);
      				$show = $page->show();
      				$this->resoucelist = $db->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
      			}
      		}elseif ($dis['district_id']){
                $count = $db->where($dis)->count();
                $page = new \Think\Page($count);
                //分页显示输出
                $show = $page->show();
                if($count){
                $this->resoucelist = $db->order('apply_time desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
                }else {
                	$count = $db->count();
                	$page = new \Think\Page($count);
                	$show = $page->show();
                	$this->resoucelist = $db->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
                }
      		}

      		
      	}
      	$this->assign('page',$show);
     	$this->display('resouce');
    }
    //资源申请列表点击查看操作
    public function runresouce(){
    	//echo ACTION_NAME;
//     	$db = M('resources');
//     	$this->resoucelist = $db->select();
        $id = I('id');
        if (!empty($id)) {
        	$db = M('resources');
        	if($db->where(array('id' => $id))->setInc('status')){
        		$this->success('操作成功',U('Admin/resouce'));
        	}else {
        	$this->error('操作失败');
        } 	
        }else {
        	$this->error('操作失败');
        }	
    }
    //删除资源列表中的某条数据
    public function delresouce(){
    	//print_r(I('username'));
    	$id = trim(I('id'));
    	$db = M('resources');
    	//print_r($id);die;
    	if ($db->where(array('id' => $id))->delete()) {
    		$this->success('删除成功',U('Admin/resouce'));
    	}else {
    		$this->error('删除失败');
    	}
    }
    //显示处理内冲申请界面
    public function nchong(){
//     	$db = M('recharge');
//     	//引入page类
//     	import('ORG.Util.Page');
//     	//统计数据总的条数
//     	$count = $db->count();
//     	$page = new \Page($count);
//     	$show = $page->show();//显示分页输出
//     	$this->rechargelist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
//     	$this->assign('page',$show);
//     	$this->display('nchong');

    	$db = M('recharge');
    	import('ORG.Util.Page');
    	$count = $db->count();
    	//
    	$map['plateform'] = trim(I('plateform'));
    	!empty($map['plateform'])?$map['plateform']:null;
    	$uer['game_name'] = trim(I('game_name'));
    	!empty($uer['game_name'])?$uer['game_name']:null;
    	$dis['district_id'] = trim(I('district_id'));
    	!empty($dis['district_id'])?$dis['district_id']:null;
    	 
    	if(!($map['plateform']||$uer['game_name']||$dis['district_id'])){
    		 
    		//实例化page类
    		$page = new \Think\Page($count);
    		//分页显示输出
    		$show = $page->show();
    		$this->rechargelist = $db->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    	
    	}else {
    		if($map['plateform']){
    			$count = $db->where($map)->count();
    			//实例化page类
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->order('apptime desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
    			}else{
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($uer['game_name']){
    			$count = $db->where($uer)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->order('apptime desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($dis['district_id']){
    			$count = $db->where($dis)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->order('apptime desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}
    	
    	
    	}
    	$this->assign('page',$show);
    	$this->display('nchong');
    	
    }
    //内充申请列表点击查看操作
    public function runnchong(){
    	$id = I('id');
    	if (!empty($id)) {
    		$db = M('recharge');
    		if($db->where(array('id' => $id))->setInc('status')){
    			$this->success('操作成功',U('Admin/nchong'));
    		}else {
    			$this->error('操作失败');
    		}
    	}else {
    		$this->error('操作失败');
    	}
    }
    //删除内冲列表中指定的某条数据
    public function delnchong(){
    	$id = trim(I('id'));
    	$db = M('recharge');
    	//print_r($id);die;
    	if ($db->where(array('id' => $id))->delete()) {
    		$this->success('删除成功',U('Admin/nchong'));
    	}else {
    		$this->error('删除失败');
    	}
    }
    //显示处理进服人员界面
    public function jfu(){
//     	$db = M('enterserver');
//     	//$this->enterserverlist = $db->select();
//     	$count = $db->count();
//     	import('ORG.Util.Page');
//     	$page = new \Page($count);
//     	$show = $page->show();//显示分页内容
//     	$this->enterserverlist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
//     	//注入分页内容到page
//     	$this->assign('page',$show);
//     	$this->display('jfu');

    	$db = M('enterserver');
    	import('ORG.Util.Page');
    	$count = $db->count();
    	//
    	$map['plateform'] = trim(I('plateform'));
    	!empty($map['plateform'])?$map['plateform']:null;
    	$uer['game'] = trim(I('game'));
    	!empty($uer['game'])?$uer['game']:null;
    	$dis['district_id'] = trim(I('district_id'));
    	!empty($dis['district_id'])?$dis['district_id']:null;
    	
    	if(!($map['plateform']||$uer['game']||$dis['district_id'])){
    		 
    		//实例化page类
    		$page = new \Think\Page($count);
    		//分页显示输出
    		$show = $page->show();
    		$this->enterserverlist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
    		 
    	}else {
    		if($map['plateform']){
    			$count = $db->where($map)->count();
    			//实例化page类
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->order('apptime')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
    			}else{
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($uer['game']){
    			$count = $db->where($uer)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->order('apptime')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($dis['district_id']){
    			$count = $db->where($dis)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->order('apptime')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->order('apptime')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}
    		 
    		 
    	}
    	$this->assign('page',$show);
    	$this->display('jfu');
    }
    //进服人员列表点击查看操作
    public function runjfu(){
    	$id = I('id');
    	if (!empty($id)) {
    		$db = M('enterserver');
    		if($db->where(array('id' => $id))->setInc('status')){
    			$this->success('操作成功',U('Admin/jfu'));
    		}else {
    			$this->error('操作失败');
    		}
    	}else {
    		$this->error('操作失败');
    	}
    }
    //删除进服人员表中的某条记录
    public function deljfu(){
    	$id = trim(I('id'));
    	$db = M('enterserver');
    	//print_r($id);die;
    	if ($db->where(array('id' => $id))->delete()) {
    		$this->success('删除成功',U('Admin/jfu'));
    	}else {
    		$this->error('删除失败');
    	}	
    }
    
    //添加用户显示页面
    public function adduser(){
    	 
    	$this->display('adduser');
    }
    //添加用户执行操作
    public function runadduser(){
    	//print_r($_POST);
    	$db = M('member');
    	$date['real_name'] = trim($_POST['real_name']);
    	$date['username'] = trim($_POST['username']);
    	$date['password'] = md5(trim($_POST['password']));
    	$date['sex'] = $_POST['sex'];
    	$date['entrytime'] = strtotime($_POST['entrytime']);
    	//echo $date['entrytime'];die;
    	$date['department'] = $_POST['department'];
    	$date['position'] = $_POST['position'];
    	$date['work_id'] = $_POST['work_id'];
    	$user = $db->where(array('username' =>  $date['username']))->select();
    	if (!empty($user)) {
    		$this->error('用户名已经存在');
    	}else {
    		if($db->add($date)){
    			$this->success('保存成功',U('Admin/index'));
    		}else {
    			$this->error('保存失败');
    		}
    	}
    }
    //修改用户个人信息界面
    public function modifyuser(){
    	$db = M('member');
    	$user = I('username');
    	//print_r($user);
    	$data = $db->where(array('username' => $user))->select();
    	//print_r($data);die;
    	$this->assign('member_id',$data[0]['member_id']);
    	$this->assign('real_name',$data[0]['real_name']);
    	$this->assign('username',$data[0]['username']);
    	$this->assign('work_id',$data[0]['work_id']);
    	$this->assign('department',$data[0]['department']);
    	$this->assign('position',$data[0]['position']);
    	//$this->position = $data['position'];
    	$this->assign('entrytime',$data[0]['entrytime']);
    	$this->assign('sex',$data[0]['sex']);
    	//echo $data[0]['position'];
    	$this->display();
    }
    //保存修改的用户信息
    public function runmodifyuser(){
    	$db = M('member');
    	$date['real_name'] = trim($_POST['real_name']);
    	$date['username'] = trim($_POST['username']);
    	$date['sex'] = $_POST['sex'];
    	$date['entrytime'] = strtotime($_POST['entrytime']);
    	//echo $date['entrytime'];die;
    	$date['department'] = $_POST['department'];
    	$date['position'] = $_POST['position'];
    	$date['work_id'] = $_POST['work_id'];
    	$id = I('member_id');
    	//print_r($data);die;
    	if (empty($date)) {
    		$this->error('修改失败');
    	}else if($db->where(array('member_id' => $id))->save($date)){
    		$this->success('修改成功',U('Admin/userlist'));
    	}else {
    		$this->error('修改失败');
    	}
    }
    //删除某个用户
    public function deluser(){
    	$id = trim(I('member_id'));
    	$db = M('member');
    	//print_r($id);die;
    	if ($db->where(array('member_id' => $id))->delete()) {
    		$this->success('删除成功',U('Admin/userlist'));
    	}else {
    		$this->error('删除失败');
    	}
    }
    //重置用户密码
    public function resetpassword(){
    	$db = M('member');
    	$pass['password'] = md5(123456);
    	$id = trim(I('member_id'));
    	if($db->where(array('member_id' => $id))->save($pass)){
    		$this->success('重置成功');
    	}else {
    		$this->error('重置失败');
    	}	
    }
    //转到修改密码界面
    public function password(){
    	$this->display('resetpassword');
    }
    
}














