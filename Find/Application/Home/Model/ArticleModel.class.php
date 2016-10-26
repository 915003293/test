<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends PlateModel {
    public function getNewArticle(){
		$arr['i']          = 'desc';
		$arr['createDate'] = 'asc';
		$data              = $this 
		->field('think_article.*,think_plate.title as plateTitle')
		-> join('INNER   JOIN  think_plate ON think_article.pid = think_plate.id')
		-> order($arr) 
		-> select();
		return $data;
	}
	public function getArticleInfo($id,$subData='*'){ //通过文章ID获取文章的信息
		$where['id']       = $id;
		$articleData       = $this 
		->field($subData)
		->where($where)
		->select();
		return $articleData[0];
	}
	public function getArticleTopPlateInfo($id,$subData='*'){ //通过板块ID获取板块的信息
		$where['id']       = $id;
		$topPlateData      = $this 
		->table('think_plate')
		->field($subData)
		->where($where)
		->select();
		return $topPlateData[0];
	}
	public function getUserInfo($id,$subData='*'){ //通过用户ID获取用户的信息
		$where['id']       = $id;
		$userData      = $this 
		->table('think_user')
		->field($subData)
		->where($where)
		->select();
		return $userData[0];
	}
	public function getUserInfoE($user,$subData='*'){ //通过用户ID获取用户的信息
		$where['user']       = $user;
		$userData      = $this 
		->table('think_user')
		->field($subData)
		->where($where)
		->select();
		return $userData[0];
	}
	public function getReplyInfo($id,$subData='*'){  //通过文章ID来获取回复信息
		$where['pid']      = $id;
		$replyInfoData     = $this 
		->table('think_Reply')
		->field($subData)
		-> order('createDate') 
		->where($where)
		->select();
		return $replyInfoData;
	}
	public function is_article($id){ //判断文章是否存在
		$where['id'] = $id;
		$num         = $this 
		-> where($where)
		-> count();
		return ($num == 0) ? false : true ; 
	}
	public function getReply($id,$subData='*'){  // 获取回复信息并分页
		$where['pid']      = $id;
		$count      	   = $this -> table('think_reply') -> where($where)->count();// 查询满足要求的总记录数
		$_GET['p'] = $_GET['p'] < 1 ? 1 : $_GET['p'];
		$_GET['p'] = $_GET['p'] > (ceil($count/5)) ? ceil($count/5) : $_GET['p'];
		$Page       	   = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show      		   = $Page->show();// 分页显示输出
		$replyInfoData     = $this 
		->table('think_Reply')
		->field($subData)
		-> order('createDate asc') 
		->where($where)
		->page($_GET['p'],5)
		->select();
		foreach($replyInfoData as $key => $val){
			$userInfo      = $this -> getUserInfo($val['userid']);
			$replyInfoData[$key]['user'] = $userInfo;
			
		}
		return array($replyInfoData,$show);
	}
	public function postReply($id,$text){ //回复帖子
		$user               = $this -> getUserInfoE(cookie('user'),'id');
		$userId             = $user['id'];
		$data['userid']     = $userId;
		$data['createdate'] = date('Y-m-d H:i:s');
		$data['content']    = $text;
		$data['pid']        = $id;
		$num                =  $this 
		-> table('think_reply')
		-> field('userid,createdate,content,pid')
		-> data($data)
		-> add();
		return $num > 0 ? true : false;
	}
	public function post($post){ //发表帖子
		$userid             = $this -> getUserInfoE(cookie('user'),'id');
		$data['title']      = $post['title']        ;
		$data['content']    = $post['textE']        ;
		$data['pid']        = $post['plate']        ;
 		$data['createdate'] = date('Y-m-d H:i:s')   ;
		$data['userId']     = $userid['id']         ;
		$id                 = $this
		->field('title,content,pid,createdate,userId')
		->data($data)
		->add()										;   
		return $id;
	}
	public function articleReplyNumAdd($id){ //文章回帖数数增加
		if($this -> is_article($id)){
			$where['id'] = $id;              //文章id
 			$num         = $this           
			-> where($where)
			->setInc('ii');                  //回帖数加1
			return $num > 0 ? true : false;
		}
		else{
			return false;
		}
	}
	public function userArticleNumerAdd($id){
		$where['id'] = $id ;
		$num         = $this
		->table('think_user')
		->where($where)
		->setInc('i');  
		return $num > 0 ? true : false;
	}
	public function articleReadingNumAdd($id){ //文章阅读数增加
		if($this -> is_article($id)){
			$where['id'] = $id;              //文章id
 			$num         = $this           
			-> where($where)
			->setInc('i');                  //阅读数加1
			return $num > 0 ? true : false;
		}
		else{
			return false;
		}
	}
	public function getText($data){ //格式化HTMl
		 $data = strip_tags($data);
		 $str  =preg_replace("/ /", "", $data);           
		 $str  =preg_replace("/&nbsp;/", "", $str);           
		 return $str;
	}
	public function checkData($data){ //检查回复的内容是否少于15个字符或者为空
		$data = $this -> getText($data);
		if(strlen($data)<15){
			return false;
		}
		if(empty($data)){
			return false;
		}
		return true;
	}
	public function arrAdd($arr1,$arr2){ //合并数组
		$arr[]  = $arr1;
		$arr[]  = $arr2;
		return $arr;
	}
	public function arrAddE($arr1,$arr2,$arr3){ //合并数组加强版
		$arr[]  = $arr1;
		$arr[]  = $arr2;
		$arr[]  = $arr3;
		return $arr;
	}
	protected function checkText($data){  //检查内容是否大于15个字节
		$data = $this -> getText($data);
		if(strlen($data)<15){
			return false;
		}
		if(empty($data)){
			return false;
		}
		return true;
	}
	protected function checkPlate($id){ 
		$where['id']  = $id;
		$where['pid'] = 0;
		$plate        = M('plate');
		$num  		  = $plate
		->where($where)
		->count();
		return $num == 0 ? true : false;
	}
}
?>