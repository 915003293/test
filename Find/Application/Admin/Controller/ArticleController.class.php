<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
		$listData = $this -> getArticleList();
		$this -> assign('listData',$listData['data']);
		$this -> assign('page',$listData['html']);
		$this -> display();
    }
	//批量操作 处理函数
	public function handleAll(){
		if(empty($_POST['selected'])){
			$this -> error('项目选择好了吗？');
		}
		foreach($_POST['selected'] as $key=> $val ){
			//销毁怪异参数,如不存的的ID
			if(!is_numeric($val)){
				var_dump(1111);
				unset($_POST['selected'][$key]);
			}
			if(!$this->isArticle($val)){
				unset($_POST['selected'][$key]);
			}
		}
		switch($_POST['type']){
			case '删除':
				//删除所有选中的文章
				if($this -> deleteAllArticle()){
					$this -> success('删除成功');
				}else{
					$this -> error('删除失败');
				}
			break;
			default:
				$this -> error('最讨厌那些乱改参数的人');
			break;
		}
	}
	//单一操作 处理函数
	public function handleOne(){
		//怪异参数过滤
		if(!is_numeric($_GET['id'])){
			$this -> error('最讨厌那些乱改参数的人');
		}
		if(!$this->isArticle($_GET['id'])){
			$this -> error('文章ID不存在');
		}
		switch($_GET['type']){
			case 'delete':
				if($this -> deleteOneArticle($_GET['id'])){
					$this -> success('删除成功');
				}else{
					$this -> error('删除失败');
				}
			break;
			default:
				$this -> error('最讨厌那些乱改参数的人');
			break;
		}
	}
	//判断文章是否存在
	public function isArticle($id){
		$article   = M('article');
		$arr['id'] = $id;
		$num       = $article  
		-> where($arr)
		-> count();
		return $num == 0 ? false : true; 
	}
	//删除所有选中的文章
	public function deleteAllArticle(){
		$article   = M('article');
		$in  	   = implode($_POST['selected'],',');
		$arr['id'] = array('IN',$in);
		$result    = $article  
		-> where($arr)
		-> delete();
		return $result == false ? false : true; 
	}
	//删除一篇文章
	public function deleteOneArticle($id){
		$article   = M('article');
		$arr['id'] = $id;
		$result    = $article  
		-> where($arr)
		-> delete();
		return $result == false ? false : true; 
	}
	//获取文章列表
	public function getArticleList(){
		//实例化文章模型
		$article = M('article');
		//获取文章数
		$count 	 = $article -> count(); 
		//显示数
		$showNub = 5;
		//最大页数
		$maxPage = ceil($count/$showNub);
		//纠正当前页数
		$_GET['p'] = $_GET['p'] < 1 ? 1 : $_GET['p'];
		$_GET['p'] = $_GET['p'] > $maxPage ? $maxPage : $_GET['p'];
		//实例化分页类
		$page      = new \Think\Page($count,$showNub);
		//获取html分页代码
		$html      =  $page -> show();
		//获取文章列表
		$listData  = $article -> page($_GET['p'],$showNub) -> select();
		return array('data'=>$listData,'html'=>$html);
	}
}