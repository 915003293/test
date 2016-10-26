<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
		$data = $this->getUser();
		$this->assign('user',$data['data']);
		$this->assign('page',$data['html']);
		$this->display();
    }
	public function handle(){
		//过滤数据
		if (empty($_POST['selected'])){
			$this->error('请选择一个项目');
		}
		else{
			foreach($_POST['selected'] as $key => $val){
				if (!is_numeric($val)){
					$this->error('参数异常');
				}
			}
			//调用相应功能
			switch ($_POST['type']){
				case '删除':
					$this->deleteALL();
				break;
				case '禁用':
					$this->banAll();
				break;
				case '启用':
					$this->enableAll();
				break;
				default:
				$this->error('参数错误');
			}
		}
	}
	public function deleteALL(){
			$in 	 	 = implode($_POST['selected'],',');
			$where['id'] = array('IN',$in); 
			$obj  	 	 = M('user');
			$result      = $obj
			->where($where) 
			->delete();
			$result      = $result==true? $this->success('删除成功'):$this->error('删除失败');
	}
	public function banAll(){
			$in 	 	  = implode($_POST['selected'],',');
			$where['id']  = array('IN',$in);
			$data['type'] = 2;
			$obj  	 	  = M('user');
			$result       = $obj
			->where($where) 
			->save($data);
			$result       = $result==true? $this->success('禁用成功'):$this->error('禁用失败');
	}
	public function enableAll(){
			$in 	 	  = implode($_POST['selected'],',');
			$where['id']  = array('IN',$in);
			$data['type'] = 0;
			$obj  	 	  = M('user');
			$result       = $obj
			->where($where) 
			->save($data);
			$result       = $result==true? $this->success('启用成功'):$this->error('启用e4f7ac669608d84a7daed8995232f8b3c333b4a8失败');
	}
	public function banOne(){
		//过滤数据
		$id  		  = $_GET['id'];
		$id  		  = empty($id)?$this->error('参数异常,连接ID不能为空'):$id;
		$id  		  = !is_numeric($id)?$this->error('参数异常,连接ID只能是数字'):$id;
		//检查连接是否存在
		$obj  	 	  = M('user');
		$where['id']  = $id;
		$num = $obj
		->where($where)
		->count();
		$num          = $num<1?$this->error('连接不存在'):$num;
		$where['id']  = $id;
		$data['type'] = 2;
		$result       = $obj
		->where($where) 
		->save($data);
		$result       = $result==true? $this->success('禁用成功'):$this->error('禁用失败');
	}
	public function enableOne(){
		//过滤数据
		$id  		  = $_GET['id'];
		$id  		  = empty($id)?$this->error('参数异常,连接ID不能为空'):$id;
		$id  		  = !is_numeric($id)?$this->error('参数异常,连接ID只能是数字'):$id;
		//检查连接是否存在
		$obj  	 	  = M('user');
		$where['id']  = $id;
		$num = $obj
		->where($where)
		->count();
		$num          = $num<1?$this->error('连接不存在'):$num;
		$where['id']  = $id;
		$data['type'] = 0;
		$result       = $obj
		->where($where) 
		->save($data);
		$result       = $result==true? $this->success('启用成功'):$this->error('启用失败');
	}
	public function delete(){
		//过滤数据
		$id  		 = $_GET['id'];
		$id  		 = empty($id)?$this->error('参数异常,连接ID不能为空'):$id;
		$id  		 = !is_numeric($id)?$this->error('参数异常,连接ID只能是数字'):$id;
		//检查连接是否存在
		$where['id'] = $id;
		$num = M('user')
		->where($where)
		->count();
		$num         = $num<1?$this->error('连接不存在'):$num;
		//删除
		$result      = M('user')->delete($id);
		$result      = $result==true? $this->success('删除成功'):$this->error('删除失败');
	}
	public function edit(){
		if (empty($_POST)){
		//显示
			//显示
			//过滤数据
			$id  		 = $_GET['id'];
			$id  		 = empty($id)?$this->error('参数异常,用户ID不能为空'):$id;
			$id  		 = !is_numeric($id)?$this->error('参数异常,用户ID只能是数字'):$id;
			//检查分类是否存在
			$where['id'] = $id;
			$info = M('user')
			->where($where)
			->find();
			$info        = empty($info)?$this->error('用户不存在'):$info;
			$this->assign('info',$info);
			$this->display();
		}else{
		//处理数据
			$post 		 = I('post.');
			$obj  		 = M('user');
			$id  		 = $post['id'];
			$where['id'] = $id;
			$id  		 = empty($id)?$this->error('参数异常,用户不能为空'):$id;
			$id  		 = !is_numeric($id)?$this->error('参数异常,用户ID只能是数字'):$id;
			$id          = empty($post['user'])?$this->error('用户名不能为空'):$id;
			$id          = empty($post['pswd'])?$this->error('密码不能为空'):$id;
			$info        = $obj
			->where($where)
			->find();
			$pswd        = $post['pswd']==$info['pswd']?$post['pswd']:sha1(md5($post['pswd']));
			$data['user']= $post['user'];			
			$data['pswd']= $pswd;			
			$data['type']= $post['type'];			
			$result      = $obj
			->field('user,pswd,type')
			->where($where)
			->save($data);
			$result      	 = $result==true? $this->success('更新成功'):$this->error('更新失败');
		}
		
		
	}
	public function getUser(){
		$obj  = M('user');
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