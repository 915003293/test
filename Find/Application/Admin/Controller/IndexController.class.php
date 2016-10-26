<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
		$userNum 	= M('user')    -> count(); //获取会员数
		$replyNum 	= M('reply') -> count(); //获取回复数
		$articleNum = M('article')-> count(); //获取帖子数
		$this->assign('userNum'	  ,$userNum);
		$this->assign('replyNum'  ,$replyNum);
		$this->assign('articleNum',$articleNum);
		$this->display();
    }
}