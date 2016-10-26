<?php
namespace Home\Model;
use Think\Model;
class PlateModel extends Model {
    public function getPlate(){
		$data = $this -> getTopPlate();
		foreach( $data as $key             => $val ){
			$arr['pid']                    = $val['id'];
			$dataAll = $this 
			-> where($arr)
			-> select();
			foreach( $dataAll as $key1     => $val1 ){
				$dataAll[$key1]['sum']     = $this -> getSumNumber( $val1['id'] );
				$dataAll[$key1]['subDate'] = $this -> getDate( $val1['id'] ) ;
			}
			$dataArr[$key]                 = $val;
			$dataArr[$key]['sub']          = $dataAll;
		}
		return $dataArr;
	}
	public function getSubPlate($id){
		$data = $this 
		-> where("pid={$id}") 
		-> order('createDate asc ')
		-> select();
		
		foreach( $data as $key => $val ){
			$data[$key]['sum']         = $this -> getSumNumber( $val['id'] );
			$data[$key]['subDate']     = $this -> getDate( $val['id'] );
		}
		return $data;
	}
	public function getSubPlateE($id){
		$data = $this 
		->field('id')
		-> where("pid={$id}") 
		-> select();
		$arr = array();
		foreach( $data as $key => $val ){
			$arr[] = $val['id'];
		}
		$arr       = implode($arr,',');
		return $arr;
	}
	public function getPlateInfo($id){
		$data = $this 
		-> where("id={$id}") 
		-> order('createDate asc ')
		-> select();
		$arr['createDate'] = array('like',date('Y-m-d',time()).'%');
		$arr['pid'] = $id;
		$data1 = $this 
		-> table('think_article')
		->where($arr)
		-> count();
		$arr1['pid']       = $id;
		$data2             = $this 
		-> table('think_article')
		->where($arr1)
		-> count();
		$data[0]['count1'] = $data1;
		$data[0]['count2'] = $data2;
		
		return $data;
	}
	public function getPlateInfoE($id){
		$ide        = $this -> getSubPlateE($id);
		if($ide==null){
			foreach( $data as $key => $val ){
				$ide[]    = $val['id'];
			}
			$data        = $this 
			->where("id = {$id}")
			->select();
			$ide         =implode($ide,',');
			$arr['pid']  = array('exp','in('.$ide.')');
			$arr['createDate'] = array('like',date('Y-m-d',time()).'%');
			$data1       = 0;
			$data2       = 0;
			return $data;
		}
		else{
			$data              = $this -> getSubPlate($id);
			$ide               = array();
			foreach( $data as $key => $val ){
				$ide[]         = $val['id'];
			}
			$data              = $this 
			->where("id        = {$id}")
			->select();
			$ide               = implode($ide,',');
			$arr['pid']        = array('exp','in('.$ide.')');
			$arr['createDate'] = array('like',date('Y-m-d',time()).'%');
			$data1             = $this 
			->table('think_article')
			->where($arr)
			->count();
			$arr1['pid']       = array('exp','in('.$ide.')');
			$data2             = $this 
			-> table('think_article')
			->where($arr1)
			-> count();
			$data[0]['count1'] = $data1;
			$data[0]['count2'] = $data2;
			return $data;
		}

	}
	public function getTopPlate(){
		$data = $this 
		-> where('pid=0') 
		-> order('createDate asc ')
		-> select();
		return $data;
	}
	public function getSumNumber($id){
		return $this
		-> table('think_article')
		-> where("pid ={$id}") 
		-> Count();
	}
	public function getDate($id){
		$data =  $this
		-> table('think_article')
		-> field('createDate as subDate')
		-> order('createDate desc')
		-> limit(1)
		-> where("pid ={$id}") 
		-> select();
		foreach( $data as $key => $val ){
			return implode($val,'');
		}
	}
	public function getLink(){
		return $this
		-> table('think_link')
		-> order('createDate desc')
		-> select();
	}
	public function isPlate($id){
		$data = $this 
		->table('think_plate')
		-> where("id ={$id}")
		-> select();
		return empty($data)?false:true;
	}
	public function isTopClass($id){
		$data = $this 
		-> where("id ={$id}")
		-> select();
		return  $data[0]['pid']==0?true:false;
	}
}
?>