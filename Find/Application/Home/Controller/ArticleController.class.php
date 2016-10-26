<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends IndexController {

	public function show(){
		if(!is_numeric($_GET['id'])){$this -> error('文章ID只能是数字');}
		if(!$this->is_article($_GET['id'])){$this -> error('没有这篇文章');}
		if(empty($_GET['p'])){$_GET['p']=1;}
	    if($this->checkCookie()){$this ->assign('user',cookie('user'));}
		$this -> getPlatePathE($_GET['id']);
		$this -> getSiteInfo();
		if($_GET['p']==1){
			$this -> setArticleInfo();
			$this -> setArticleReplyInfo();
		}
		else{
			$this -> setArticleReplyInfo();
		}
		
		$this -> display('home/article');
	}
	//获取板块列表
	public function getPlateList($pid=0,&$data=array(),$i=0){
		$plate = M('plate');
		$arr   = $plate ->query("select * from think_plate where pid={$pid}");
		$i+=3;         
		foreach( $arr as $key => $val ){
			if($val['pid']!=0){
				$val['title'] = str_repeat('&nbsp;',$i) . "|--" . $val['title'] . "-";
			}
			else{
				$val['f'] = true;
			}
			$data[] = $val;		
			$this -> getPlateList($val['id'],$data,$i);
		}
		return $data;
	}
	public function setArticleInfo(){ //获取文章信息并赋值到模版
		$obj           = D('Article');	
		$obj          -> articleReadingNumAdd($_GET['id']);//阅读数加1
		$articleInfo   = $obj -> getArticleInfo($_GET['id']); //获取文章信息
		$topPlateInfo  = $obj -> getArticleTopPlateInfo($articleInfo['pid']); //获取上级板块信息
		$userInfo      = $obj -> getUserInfo($articleInfo['userid']);
		$info          = $obj -> arrAddE($articleInfo,$topPlateInfo,$userInfo); 
		$this         -> assign('ArticleInfo',$info);
	}
	//发表帖子
	public function post(){
		$post = I('post.');
		$post['textE']  = $_POST['text'];
		if(empty($post['submit'])){
			//显示发帖界面
			$this -> getSiteInfo();
			$this -> getLink();
			if($this->checkCookie()){$this ->assign('user',cookie('user'));}
			$postList = $this -> getPlateList();
			$this -> assign('postList',$postList);
			$this -> assign('articleid',$_GET['id']);
			$this -> display('home/post');
		}
		else{
			 if(!$this->checkCookie()){
				$this -> error("请登录后在发表帖子");
			}
			//验证数据
			$rules   = array(
				 array('plate' ,'require'   ,'必须选择发帖板块') ,
				 array('title' ,'require'   ,'必须填写帖子标题') ,
				 array('text'  ,'require'   ,'必须填写帖子内容') ,
				 array('title' ,'6,25'      ,'标题长度格式错误'  ,3,'length')  ,
				 array('textE' ,'checkText' ,'帖子长度格式错误'  ,3,'callback'),
				 array('plate' ,'isPlate'   ,'板块不存在'        ,3,'callback'),
				 array('plate' ,'checkPlate','不能在顶级板块发帖',3,'callback'),
			);
			$article =  D('Article');

			if($article -> validate($rules) -> create($post)){
				$id = $article -> post($post); //发帖
				
				if($id>0){
					//发帖成功
					$id    = intval($id, 10);
					$this -> success('发帖成功',U('Article/show',array('id'=>$id)));
					//获取用户ID
					$id    = $article -> getUserInfoE(cookie('user'),'id')['id'];

					//用户发帖数+1
					$article -> userArticleNumerAdd($id);
				}
				else{
					//发帖失败
					$this -> error('发帖失败');
				}
			}
			else{
				$this -> error($article->getError());
			}
		}
		
	}
	//发表回复
	public function postReply(){ 
		$obj           = D('Article');	
		$result = $obj -> checkData($_POST['text']);
		if(!$result){
			$this      -> error('回复内容是null或者回复内容不够15个字');
		}
		if(!$this      -> is_article($_POST['articleId'])){
			$this      -> error('这个帖子不存在');
		}
	   if(!$this->checkCookie()){
			$this -> error("请登录后在发表帖子");
	   }
		$result = $obj -> postReply($_POST['articleId'],$_POST['text']);
		if(!$result){
			$this      -> error('回复失败');
		}
		else{
			$obj             -> articleReplyNumAdd($_POST['articleId']);
			$where['pid']      = $_POST['articleId'];
			$count      	   = M('reply')  -> where($where)->count();// 查询满足要求的总记录数
			$count             = ceil( $count/= 5);
			$num               = rand(1111,9999);
		    $this             -> success('回复成功',U('Article/show',array('id'=>$_POST['articleId'],'p'=>$count,'r'=>$num)));
		}
	}
	public function setArticleReplyInfo() { //获取回复信息并赋值到模版
		$obj           = D('Article');
	    $getReply  = $obj -> getReply($_GET['id']);
		$this  -> assign('replyListInfo',$getReply[0]);
		$this  -> assign('page',$getReply[1]);
		$this  -> assign('pageNum',$_GET['p']);
		$this  -> assign('articleId',$_GET['id']);
	}
	public function is_article($id){ //判断文章是否存在
		$obj = D('Article');
		return $obj -> is_article($id) ; 
	}

}	
?>