<?php
namespace Home\Controller;
use Think\Controller;
class RegisteredController extends IndexController {

	public function index(){
		$post = I('post.'); //过滤数据
		if(empty($post['submit'])){
			$this -> getSiteInfo();
			$this -> display('home/Registered');
		}
		else{
			$rules = array( //验证规则
				 array('user','require','帐号必须填写'), 
				 array('pswd','require','密码必须填写'), 
				 array('pswdOk','require','确认密码必须填写'), 
				 array('code','require','验证码必须填写'), 
				 array('pswd','pswdOk','确认密码不正确',0,'confirm'),
				 array('user','6,11','帐号格式错误',3,'length'),
			     array('pswd','6,11','密码格式错误',3,'length'),
			     array('pswdOk','6,11','密码格式错误',3,'length'),
			     array('code','5','验证码格式错误',3,'length'),
			);
			$this -> getSiteInfo();
			$user = D("User"); // 实例化User对象
			if (!$user->validate($rules)->create($post)){
				 // 如果创建失败 表示验证没有通过 输出错误提示信息
				 $this -> error($user->getError());
			}else{
				if (!$this->checkCode($post['code'])){
					//验证码错误
					$this -> error('验证码错误'); 
				}
				else{
					//验证码正确
					if (!$user -> isUser(null,$post['user'])){
						if($user -> registered($post)){
						$COOKIE_PREFIX = C('COOKIE_PREFIX');
						cookie('user',$post['user'],array('expire'=>3600,'prefix'=> $COOKIE_PREFIX ));
						cookie('pswd',sha1(md5($post['pswd'])),array('expire'=>3600,'prefix'=>$COOKIE_PREFIX ));
							$rand = rand(1111,9999);
							$this -> success("注册成功！",U("index/index/",array('r'=>$rand)));
						}
						else{
							$this -> error('注册失败！');
						}
					}
					else{
						$this -> error('用户名已经存在');
					}
				}
			}
		}
	}
}