<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function login(){
		if($this->checkUser(2)){
			$this->error('禁止重复登录',U('Admin/index/index'),3);
		}
		else{
			if (empty($_POST['submit'])){
				//显示登录页面
				$this->display('Login/Login');
			}else{
				//检查数据
				$post  = I('post.');
				$post['username1'] = empty($post['username1']) ? $this->error('填写帐号好吗？'): $post['username1'];
				$post['password1'] = empty($post['password1']) ? $this->error('填写密码好吗？'): $post['password1'];
				$User = M("user"); 
				//验证密码
				if ($this->checkUser()){
					$user = cookie('user');
					$this->success("欢迎回来{$user}",U('Admin/index/index'),3);
				}else{
					$this->error('帐号密码错误或者权限不足');
				}
			}
		}
	}
	public function checkUser($type=1){ //1表示验证post数据 2表示验证cookies数据
		$User = M("user"); 
		if ($type==1){
				$where['user'] = I('post.username1');
				$where['pswd'] = sha1(md5(I('post.password1')));
				$where['type'] = 1;
				$userInfo      = $User 
				->where($where)
				->find();
				if ($userInfo['id']!=''){
					//设置cookies
					cookie('user',$where['user'],array('expire'=>3600,'prefix'=>C('COOKIE_PREFIX')));
					cookie('pswd',$where['pswd'],array('expire'=>3600,'prefix'=>C('COOKIE_PREFIX')));
					return true;
				}else{
					return false;
				}
		}else{
				$where['user'] = cookie('user');
				$where['pswd'] = cookie('pswd');
				$where['type'] = 1;
				$userInfo      = $User
				->where($where)
				->find();
				if ($userInfo['id']!=''){
					return true;
				}else{
					return false;
				}
		}
	}
	public function unLogin(){
		cookie(null,C('COOKIE_PREFIX'));
		$this->success("注销成功",U('Admin/Login/login'),3);
	}
}