<?php
namespace Home\Controller;
//use Think\Controller;
use Common\Controller\InitController;
class ApplyController extends InitController {
    public function index(){
    	
    	
    }
    //申请资源界面
    public function resouse(){
    	$this->display('resouse');
    }
    //处理提交申请的资源
    public function doresouse(){
        //print_r($_POST);die;
    	if(!empty($_POST)){
    		$db = M('resources');
    		$nchong = $db->add($_POST);
    		if($nchong){
    			$this->success('提交成功',U('User/index'));
    		}else {
    			$this->error('提交失败',U('Apply/resouse'));
    		}
    	}else {
    		$this->error('申请失败');
    	}	
    }
    //资源申请列表
    public function resouselist(){
    	$db = M('resources');
    	import('ORG.Util.Page');
    	$user['username'] = $_SESSION['username'];
    	$count = $db->where($user)->count();
    	//echo $user['username'];die;
    	$map['plateform'] = trim(I('plateform'));
    	!empty($map['plateform'])?$map['plateform']:null;
    	$uer['game_name'] = trim(I('game_name'));
    	!empty($uer['game_name'])?$uer['game_name']:null;
    	$dis['district_id'] = trim(I('district_id'));
    	!empty($dis['district_id'])?$dis['district_id']:null;
    	
    	if(!($map['plateform']||$uer['game_name']||$dis['district_id'])){
	    		
	      	//实例化page类
	      	$page = new \Think\Page($count);
	      	//$page = new \Think\Page($count);
	      	//分页显示输出
	      	$show = $page->show();
	      	$this->resoucelist = $db->where($user)->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
	      	
    	}else {
      		if($map['plateform']){
      			$count = $db->where($user)->where($map)->count();
      			//实例化page类
      			$page = new \Think\Page($count);
      			//分页显示输出
      			$show = $page->show();
      			if($count){
      			$this->resoucelist = $db->where($user)->order('apply_time desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
      			}else{
      				$count = $db->count();
      				$page = new \Think\Page($count);
      				$show = $page->show();
      				$this->resoucelist = $db->where($user)->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
      			} 
      		}elseif ($uer['game_name']){
      			$count = $db->where($uer)->count();
      			$page = new \Think\Page($count);
      			//分页显示输出
      			$show = $page->show();
      			if($count){
      			$this->resoucelist = $db->where($user)->order('apply_time desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
      			}else {
      				$count = $db->count();
      				$page = new \Think\Page($count);
      				$show = $page->show();
      				$this->resoucelist = $db->where($user)->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
      			}
      		}elseif ($dis['district_id']){
                $count = $db->where($dis)->count();
                $page = new \Think\Page($count);
                //分页显示输出
                $show = $page->show();
                if($count){
                $this->resoucelist = $db->where($user)->order('apply_time desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
                }else {
                	$count = $db->count();
                	$page = new \Think\Page($count);
                	$show = $page->show();
                	$this->resoucelist = $db->where($user)->order('apply_time desc')->limit($page->firstRow.','.$page->listRows)->select();
                }
      		}

      		
      	}
      	$this->assign('page',$show);
     	$this->display('resoucelist');
    
    }
    
    //内冲申请界面
    public function nchong(){
    	$this->display('nchong');
    }
    //处理内冲
    public function donchong(){
    	if($_POST){
    		$db = M('recharge');
    		$nchong = $db->add($_POST);
    		if($nchong){
    			$this->success('提交成功',U('User/index'));
    		}else {
    			$this->error('提交失败',U('Apply/nchong'));
    		}
    	}	
    }
    //内冲申请列表
    public function nchonglist(){	
    	$db = M('recharge');
    	import('ORG.Util.Page');
    	$user['username'] = $_SESSION['username'];
    	$count = $db->where($user)->count();
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
    		$this->rechargelist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    		 
    	}else {
    		if($map['plateform']){
    			$count = $db->where($user)->where($map)->count();
    			//实例化page类
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->where($user)->order('apptime desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
    			}else{
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($uer['game_name']){
    			$count = $db->where($user)->where($uer)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->where($user)->order('apptime desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($dis['district_id']){
    			$count = $db->where($user)->where($dis)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->rechargelist = $db->where($user)->order('apptime desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->rechargelist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}
    		 
    		 
    	}
    	$this->assign('page',$show);
    	$this->display('nchonglist');
    }
    
    //进服人员界面
    public function jfu(){
    	$this->display('jfu');
    }
    //出来进服人员
    public function dojfu(){
    	$date['username'] = trim($_POST['username']);
    	$date['game'] = trim($_POST['game']);
    	$date['plateform'] = trim($_POST['plateform']);
    	$date['district_id'] = $_POST['district_id'];
    	$date['accessman'] = trim($_POST['accessman']);
    	$date['leader_gamename'] = trim($_POST['leader_gamename']);
    	$date['entertime'] = trim($_POST['entertime']);
    	$date['remarks'] = $_POST['remarks'];
    	if($date){
    		$db = M('enterserver');
    		$jfu = $db->add($date);
    		if($jfu){
    		$this->success('提交成功',U('User/index'));
    		}else {
    			$this->error('提交失败',U('Apply/jfu'));
    		}
    	}
    }
    //进服人员列表
    public function jfulist(){    	
    	$db = M('enterserver');
    	import('ORG.Util.Page');
    	$user['username'] = $_SESSION['username'];
    	$count = $db->where($user)->count();
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
    		$this->enterserverlist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    		 
    	}else {
    		if($map['plateform']){
    			$count = $db->where($user)->where($map)->count();
    			//实例化page类
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
    			}else{
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($uer['game']){
    			$count = $db->where($user)->where($uer)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->where($uer)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}elseif ($dis['district_id']){
    			$count = $db->where($user)->where($dis)->count();
    			$page = new \Think\Page($count);
    			//分页显示输出
    			$show = $page->show();
    			if($count){
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->where($dis)->limit($page->firstRow.','.$page->listRows)->select();
    			}else {
    				$count = $db->where($user)->count();
    				$page = new \Think\Page($count);
    				$show = $page->show();
    				$this->enterserverlist = $db->where($user)->order('apptime desc')->limit($page->firstRow.','.$page->listRows)->select();
    			}
    		}	 
    	}
    	$this->assign('page',$show);
    	$this->display('jfulist');    	
    }
    
    
}
















