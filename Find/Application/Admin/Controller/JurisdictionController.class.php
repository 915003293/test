<?php
namespace Admin\Controller;
use Think\Controller;
class JurisdictionController extends CommonController {

	public function group(){
		$groupList = M('group')
		-> select();
		$this 	 -> assign('groupList',$groupList);
		$this 	 -> display();
		
		

		
	}
	//启用用户组 支持批量
	public function startGroup(){
			$this -> checkIds($_GET['id']);
			$group     	   = M('group');
			$arr['id'] 	   = array('in',$_GET['id']);
			$arr['status'] = 1;
			$t		  	   = $group
			-> save($arr);
			return $t>0 ? $this -> success('修改成功',U('Admin/Jurisdiction/group')) : $this -> error('修改失败',U('Admin/Jurisdiction/group')) ;
	}
	//禁用用户组 支持批量
	public function banGroup(){
			$this -> checkIds($_GET['id']);
			$group     	   = M('group');
			$arr['id'] 	   = array('in',$_GET['id']);
			$arr['status'] = 0;
			$t		  	   = $group
			-> save($arr);
			return $t>0 ? $this -> success('修改成功',U('Admin/Jurisdiction/group')) : $this -> error('修改失败',U('Admin/Jurisdiction/group')) ;
	}
	//删除用户组 支持批量
	public function deleteGroup(){
			$this -> checkIds($_GET['id']);
			$group     = M('group');
			$arr['id'] = array('in',$_GET['id']);
			$t		   = $group
			-> where($arr)
			-> delete();
			return $t>0 ? $this -> success('删除成功',U('Admin/Jurisdiction/group')) : $this -> error('删除失败',U('Admin/Jurisdiction/group')) ;
	} 
	
	public function checkIdPost(){
		$_POST['id'] = I('post.id');
		$_POST['id'] = empty($_POST['id']) ? $this -> error('大兄弟你ID掉了1') : $_POST['id'];		
		if(is_array($_POST['id'])){
			foreach($_POST['id'] as $key => $val){
				if(is_numeric($val)){
					$id .= $val.',';
				}
			}
			$id     =  empty($id) ? $this -> error('大兄弟你ID掉了2') : $id;
			return trim($id,',');
		}else{
			$_POST['id'] =  !is_numeric($_POST['id']) ? $this -> error('大兄弟你家ID是文字？') : $_POST['id'];
		}
	}	
	
	public function checkIds($ids){
		$ids = !is_numeric(str_replace(',','',$ids)) ? $this -> error('大兄弟花招不少嘛？') : $ids;
	}
	
	
	public function rule(){
		$rule      = M('rule');
		$ruleList  = $rule
		-> select();
		$this 	 -> assign('ruleList',$ruleList);
		$this -> display();
		
	}
	
	//启用权限 支持批量
	public function startRule(){
			$this -> checkIds($_GET['id']);
			$rule     	   = M('rule');
			$arr['id'] 	   = array('in',$_GET['id']);
			$arr['status'] = 1;
			$t		  	   = $rule
			-> save($arr);
			return $t>0 ? $this -> success('启用成功',U('Admin/Jurisdiction/rule')) : $this -> error('启用失败',U('Admin/Jurisdiction/rule')) ;
	}
	//禁用权限 支持批量
	public function banRule(){
			$this -> checkIds($_GET['id']);
			$rule     	   = M('rule');
			$arr['id'] 	   = array('in',$_GET['id']);
			$arr['status'] = 0;
			$t		  	   = $rule
			-> save($arr);
			return $t>0 ? $this -> success('禁用成功',U('Admin/Jurisdiction/rule')) : $this -> error('禁用失败',U('Admin/Jurisdiction/rule')) ;
	}
	//删除规则 支持批量
	public function deleteRule(){
			$this -> checkIds($_GET['id']);
			$rule      = M('rule');
			$arr['id'] = array('in',$_GET['id']);
			$t		   = $rule
			-> where($arr)
			-> delete();
			return $t>0 ? $this -> success('删除成功',U('Admin/Jurisdiction/rule')) : $this -> error('删除失败',U('Admin/Jurisdiction/rule')) ;
	} 
	
	public function editGroup(){
		$group  	= M('group_access');
		$list		= $group 
		-> join("right join think_group on think_group_access.group_id = think_group.id")
		-> where(array('group_id' => array('eq',$_GET['id']),'status'=>array('eq',1)))
		-> select();
		$ids    = null;
		foreach($list as $key => $val){
			$ids .= $val['rules'].',';
		}
		$ids 	 = trim($ids,',');
		$ids     = "'" . $ids . "'";
		$rule    = M('rule');
		$list    = $rule 
		-> where('status = 1')
		-> select();
		$ruleTop = M('modules');
		$topList = $ruleTop 
		-> select();
		$this   -> assign('ids',$ids);
		$this   -> assign('list',$list);
		$this   -> assign('topList',$topList);
		$this   -> display();
	}
	
	
	
	//批量方法
	public function handle(){
		$id = $this -> checkIdPost();
		switch($_POST['method']){
			
			case 'group':
			
				switch($_POST['type']){
					case 'ban':
						$this -> success('跳转中',U('Admin/Jurisdiction/banGroup',array('id'=>$id)));
					break;
					case 'start':
						$this -> success('跳转中',U('Admin/Jurisdiction/startGroup',array('id'=>$id)));
					break;
					case 'delete':
						$this -> success('跳转中',U('Admin/Jurisdiction/deleteGroup',array('id'=>$id)));
					break;
				}
				
			break;
			
			case 'rule':
			
				switch($_POST['type']){
					case 'ban':
						$this -> success('跳转中',U('Admin/Jurisdiction/banRule',array('id'=>$id)));
					break;
					case 'start':
						$this -> success('跳转中',U('Admin/Jurisdiction/startRule',array('id'=>$id)));
					break;
					case 'delete':
						$this -> success('跳转中',U('Admin/Jurisdiction/deleteRule',array('id'=>$id)));
					break;
					
				}
				
			break;
		}
		
	}



}