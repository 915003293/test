<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends LoginController {
    public function __construct(){
		parent::__construct();
		
		if($this->checkUser(2)){
			//已经登陆

			$user = cookie('user');
			$M  = M('user');
			$M -> where("user = '{$user}'") -> find();
			$id = $M->id;
			$auth = new \Think\Auth;
			if(!$auth ->Check(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,$id)){
				$this->error('你没有权限!');
			}
			session('uid',$id);

		}else{
			//未登录
			$this->error('请先登录',U('Admin/Login/login'),3);
		}
		//权限验证

		
		

    }
}