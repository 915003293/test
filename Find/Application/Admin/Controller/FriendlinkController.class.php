<?php
namespace Admin\Controller;
use Think\Controller;
class FriendlinkController extends CommonController {
    public function index(){
		$arr = $this->getFriendLink();
		$this->assign('linkList',$arr['data']);
		$this->assign('page',$arr['html']);
		$this->display();
    }
	public function Add(){
		if (empty($_POST)){
			$this->display();
		}else{
			//过滤数据
			$title 	  			 = empty(I('post.title'))?$this->error('参数异常,标题不能为空'):I('post.title');
			$describe 			 = empty(I('post.describe'))?$this->error('参数异常,描述不能为空'):I('post.describe');
			$link     			 = empty(I('post.link'))?$this->error('参数异常,连接不能为空'):I('post.link');
			$bool     			 = preg_match("/[a-zA-z]+:\/\/[^\s]*/",$link,$arr)==false?$this->error('参数异常,输入的不是URL地址'):true;
			$obj     		     = M('link');
			$data['title']       = $title;
			$data['describe']    = $describe;
			$data['link']    	 = $link;
			$data['createDate']  = date('Y-m-d H:i:s');
			$result   			 = $obj-> add($data);
			$result   			 = $result==false?$this->error('添加失败'):$this->success('添加成功');
		}
	}
	public function Edit(){
		if (empty($_POST)){
			//显示
			//过滤数据
			$id 	  	 = empty(I('get.id'))?$this->error('参数错误,友情链接ID为空'):I('get.id');
			$id 	  	 = !is_numeric(I('get.id'))?$this->error('参数错误友联ID只能为数字'):I('get.id');
			$where['id'] = $id;
			//获取数据 
			$obj         = M('link');
			$data        = $obj
			->where($where)
			->find();
			$data        = empty($data)?$this->error('ID无效'):$data;
			$this->assign('list',$data);
			$this->display();
		}else{
			//处理数据
			$title 	  	 = empty(I('post.title'))?$this->error('参数异常,标题不能为空'):I('post.title');
			$id 	  	 = empty(I('post.id'))?$this->error('参数错误,友情链接ID为空'):I('post.id');
			$id 	  	 = !is_numeric(I('post.id'))?$this->error('参数错误友联ID只能为数字'):I('post.id');
			$describe 	 = empty(I('post.describe'))?$this->error('参数异常,描述不能为空'):I('post.describe');
			$link     	 = empty(I('post.link'))?$this->error('参数异常,连接不能为空'):I('post.link');
			$bool     	 = preg_match("/[a-zA-z]+:\/\/[^\s]*/",$link,$arr)==false?$this->error('参数异常,输入的不是URL地址'):true;
			$where['id'] = $id;
			//获取数据 
			$obj         = M('link');
			$data        = $obj
			->where($where)
			->find();
			$data        = empty($data)?$this->error('ID无效'):$data;
			$data        = $obj->create();
			$result      = $obj->save($data);
			$result      = $result==true? $this->success('更新成功'):$this->error('更新失败');
		}
	}
	public function Delete(){
		//过滤数据
		$id  		 = $_GET['id'];
		$id  		 = empty($id)?$this->error('参数异常,连接ID不能为空'):$id;
		$id  		 = !is_numeric($id)?$this->error('参数异常,连接ID只能是数字'):$id;
		//检查连接是否存在
		$where['id'] = $id;
		$num = M('link')
		->where($where)
		->count();
		$num         = $num<1?$this->error('连接不存在'):$num;
		//删除
		$result      = M('link')->delete($id);
		$result      = $result==true? $this->success('删除成功'):$this->error('删除失败');
	}
	public function DeleteAll(){
		if (empty($_POST['selected'])){
			$this->error('请选择一个项目');
		}
		else{
			foreach($_POST['selected'] as $key => $val){
				if (!is_numeric($val)){
					$this->error('参数异常');
				}
			}
			$in 	 	 = implode($_POST['selected'],',');
			$where['id'] = array('IN',$in); 
			$obj  	 	 = M('link');
			$result      = $obj
			->where($where) 
			->delete();
			$result      = $result==true? $this->success('删除成功'):$this->error('删除失败');
		}

	}
	public function getFriendLink(){
		$obj     = M('link');
		//显示数量
		$showNum = 10;
		//记录数 
		$count   = $obj->count();
		//最大页数
		$maxPage = ceil($count/$showNum);
		//纠正当前页
		$_GET['p']  = $_GET['p']<1?1:$_GET['p']; 
		$_GET['p']  = $_GET['p']>$maxPage?$maxPage:$_GET['p'];
		//实例化分页类
		$Page    = new \Think\Page($count,$showNum);
		//获取友情连接数据
		$list    = $obj
		//按照创建时间排序
		->order('createdate')
		//限制输出
		->page($_GET['p'],$showNum)
		//查询
		->select();
		//获取分页HTML代码
		$html    = $Page->show();
		return array('data'=>$list,'html'=>$html);
	}
}