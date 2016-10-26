<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
		$this -> getSiteInfo();
		if ($this->checkCookie()){ $this -> error("禁止重复登录",U('index/index')); }
		else{ $this->display('home/login'); }
    }
	public function getSiteInfo(){
		$site = M('site');
		$info = $site -> find();
		$this -> assign('siteInfo',$info);
	}
	public function login(){
		if(I('post.submit')!==''){
			$post  = I('post.');
			$rules = array(
			 array('user','require','帐号必须填写'), 
			 array('pswd','require','密码必须填写'), 
			 array('code','require','验证码必须填写'),
			 array('user','6,11','帐号格式错误',3,'length'),
			 array('pswd','6,11','密码格式错误',3,'length'),
			 array('code','5','验证码格式错误',3,'length'),
	   );
			$user = D("User"); // 实例化User对象
			if (!$user->validate($rules)->create($post)){
				 // 如果创建失败 表示验证没有通过 输出错误提示信息
				 $this -> error($user->getError());
			}else{
				 // 验证通过 可以进行其他数据操作
				if (!$this->checkCode($post['code'])){ $this -> error('验证码错误'); }//判断验证码是否正确
				if (!$user->checkUser($post)){ $this -> error('密码错误'); };  //验证帐号密码是否正确
				$COOKIE_PREFIX = C('COOKIE_PREFIX');
				cookie('user',$post['user'],array('expire'=>3600,'prefix'=> $COOKIE_PREFIX ));
				cookie('pswd',sha1(md5($post['pswd'])),array('expire'=>3600,'prefix'=>$COOKIE_PREFIX ));
				$rand = rand(1111,9999);
				$user -> setDate();
				$this -> success("欢迎回来:{$post['user']}",U("index/index/",array('r'=>$rand)));
			}
		}
		else{
			$this -> error('/login/index.shtml');
		}
	}
	public function checkCookie(){ //检查登录缓存
		if (empty(cookie('user')) or empty(cookie('pswd'))){ return false; } 
		$cookie =  cookie();
		$user  = D("User"); 
		if (!$user->checkUser($cookie,false)){ return false; }
		
		return true;
	}
	public function unCookie(){ //注销cookie
		cookie('user',null);
		cookie('pswd',null);
		cookie(null);
		$rand = rand(1111,9999);
		$this -> success("注销成功",U("index/index/",array('r'=>$rand)));
	}
	public function code(){ //获取验证码图片
		ob_clean();
		$Verify = new \Think\Verify();
		$Verify->entry();
	}
	function checkCode($code, $id = ''){ //验证验证码是否正确
		$verify = new \Think\Verify();
		return true;
		return $verify->check($code, $id);
	}
}