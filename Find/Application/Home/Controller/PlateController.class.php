<?php
namespace Home\Controller;
use Think\Controller;
class PlateController extends IndexController {
	public function GetsubClassArticle($id){
		$rules  = array(
		 array('id','number','ID只能是數字'), 
		 array('p' ,'number','页码只能是数字'), 
		);
		$obj   = D('Plate');
		$data  = $_GET;
		if (!$obj -> validate($rules) -> create($data)){
			$this -> error($obj -> getError());
		}else{
			$this -> getSiteInfo();
			if(!$obj  -> isPlate($data['id'])){
				$this -> error('沒有這個板塊');
			}
			else{
				if($this->checkCookie()){$this ->assign('user',cookie('user'));}
				if($obj -> isTopClass($data['id'])){
					$this -> getSubPlate($data['id']);
					$this -> getPlatePath($data['id']);
					$this -> getPlate();
					$this -> getPlateInfoE($id);
					$this -> pages($id);
					$this -> assign('articleid',$_GET['id']);
					$this -> display('home/Plate');
				}
				else{
					$this -> getPlateInfo($id);
					$this -> getPlatePath($data['id']);
					$this -> getPlate();
					$this -> page($id);
					$this -> assign('articleid',$_GET['id']);
					$this -> display('home/Plate');
				}
			}
		}
	}

}