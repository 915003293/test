<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends LoginController {
    public function index(){
	  $this -> getNewArticle();
	  $this -> getPlate();
	  $this -> getLink();
	  $this -> getSiteInfo();
	  if($this->checkCookie()){
	  $this ->assign('user',cookie('user'));}
	  $this -> display('home/home');
    }

	public function getNewArticle(){
		$obj  = D('Article');
		$data = $obj -> getNewArticle();
		$this -> assign('NewArticleList',$data);
	}
	public function getPlate(){
		$obj  = D('Plate');
		$data = $obj -> getPlate();
		$this -> assign('PlateList',$data);
	
	}
	public function getLink(){
		$obj  = D('Plate');
		$data = $obj -> getLink();
		$this -> assign('linkList',$data);

	}
	public function getSubPlate($id){
		$obj  = D('Plate');
		$data = $obj -> getSubPlate($id);
		$this -> assign('subPlateList',$data);
		
	}
	public function getSubPlateE($id){
		$obj  = D('Plate');
		$data = $obj -> getSubPlateE($id);
		return $data;
	}
	public function getPlateInfo($id){
		$obj  = D('Plate');
		$data = $obj -> getPlateInfo($id);
		$this -> assign('PlateInfo',$data);
	}
	public function getPlateInfoE($id){
		
		$obj  = D('Plate');
		$data = $obj -> getPlateInfoE($id);
		$this -> assign('PlateInfo',$data);
		
	}
	public function getUser($id){
		$obj   = M('article');
		$data  = $obj
		->field('userId')
		-> where("id ={$id}")
		-> select();
		$id = implode($data[0],'');
		$data  = $obj 
		->table('think_user')
		->field('user')
		->where("id = {$id}")
		->select();
		$user = implode($data[0],'');
		return $user;
		
	}
	public function getArticleName($id){
		$obj   = M('article');
		$data  = $obj
		->field('title,id')
		-> where("id ={$id}")
		-> select();
		$data[0]['n'] =false;
		return $data[0];
	}
	public function getArticleId($id){
		$obj   = M('article');
		$data  = $obj
		->field('pid')
		-> where("id ={$id}")
		-> select();
		$user = implode($data[0],'');
		return $user;
	}
	public function getUserImg($id){
		$obj   = M('article');
		$data  = $obj
		->field('userId')
		-> where("id ={$id}")
		-> select();
		$id = implode($data[0],'');
		$data  = $obj 
		->table('think_user')
		->field('img')
		->where("id = {$id}")
		->select();
		$user = implode($data[0],'');
		return $user;
	}
	public function page($id){
		$User = M('article'); // 实例化User对象
		$count     = $User->where("pid={$id}")->count();// 查询满足要求的总记录数
		$_GET['p'] = $_GET['p'] < 1 ? 1 : $_GET['p'];
		$_GET['p'] = $_GET['p'] > (ceil($count/1)) ? $count : $_GET['p'];
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $User->where("pid={$id}")->order('createDate')->page($_GET['p'].',10')->select();
		foreach( $list as $key => $val ){
			$list[$key]['user'] = $this -> getUser($val['id']);
			$list[$key]['img'] = $this -> getUserImg($val['id']);
		}

		$this->assign('list',$list);// 赋值数据集
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this       ->assign('page',$show);// 赋值分页输出
	}
	public function pages($id){
		$id    = $this -> getSubPlateE($id);
		$arr1['pid'] = array('in',$id);
		$User  = M('article'); // 实例化User对象

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $User->where($arr1)->order('createDate')->page($_GET['p'].',10')->select();
		foreach( $list as $key => $val ){
			$list[$key]['user'] = $this -> getUser($val['id']);
			$list[$key]['img'] = $this -> getUserImg($val['id']);
		}
		$this->assign('list',$list);// 赋值数据集
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this       ->assign('page',$show);// 赋值分页输出

	}
	public function getPlatePath($id,&$arr=array()){
		$data = M('plate')
		->field('id,title,pid')
		->where("id = {$id}")
		-> select();
		$data[0]['n'] = true;
		$arr[] = $data[0];
		$pid = $data[0]['pid'];
		if($pid==0){
			asort($arr);
			$this -> assign('path',$arr);
			
		}
		else{
			$this -> getPlatePath($pid,$arr);
		}
		return $arr;
	}
		public function getPlatePathE($id,&$arr=array()){
		 $data = $this -> getArticleName($id);
		 $ide = $this -> getArticleId($id);
		 $arr  = $this -> getPlatePath($ide);
		$arr[] = $data;
		$this -> assign('path',$arr);		
		}
}