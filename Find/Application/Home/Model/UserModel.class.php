<?php
namespace Home\Model;
use Think\Model;
class userModel extends ArticleModel {

   public function checkUser($data,$type=true){ //验证帐号密码
		if ($type){
		//正常验证
		   $where['user'] = $data['user'];
		   $where['pswd'] = sha1(MD5($data['pswd']));
		   $num = $this 
		   -> where($where)
		   -> count();
		   return $num == 0 ? false : true;
		}
		else{
		
		//cookies验证
		   $where['user'] = $data['think_user'];
		   $where['pswd'] = $data['think_pswd'];
		   $num = $this 
		   -> where($where)
		   -> count();
		   return $num == 0 ? false : true;
		}

   }
   public function registered($data){ //注册
		if(!$this -> isUser($data['user'])){
			//帐号没被注册
			$data['user']       = $data['user'];
			$data['pswd']       = sha1(md5($data['pswd']));
			$data['createdate'] = date('Y-m-d');
			$data['enddate']    = date('Y-m-d');
			$data['img']        = 'user.png';
			$data['type']       = 0;
			$num = $this			
			->data($data)
			->add();
			return $num == 0 ? false : true;
		}
		else{
			//帐号已被注册
			return false;
		}
   }
   public function isUser($id=null,$name=null){ //判断用户是否存在
	   if(empty($id)){
		   if(empty($name)){
			   return false;
		   }
		   else{
			   //通过名字判断
			   
			   $where['user']  = $name;
			   $num            = $this
			   -> where($where)
			   -> count();
			   return $num == 0 ? false : true;
		   }
	   }
	   else{
		    //通过ID判断
		   $where['id'] = $id;
		   $num         = $this
		   -> where($where)
		   -> count();
		   return $num == 0 ? false : true;
	   }
   }
   public function setDate(){ //设置登录时间
	   $user               = $this -> getUserInfoE(cookie('think_user'),'id');
	   $userId             = $user['id'];
	   $data['enddate']    = date('Y-m-d');
	   $where['id']        = $userId;
	   $a =  $this 
	   ->field('enddate')
	   ->where($where)
	   ->save($data);
	   return $num == 0 ? false : true;
   }
}
?>
