<?php
namespace Admin\Controller;
use Think\Controller;
class SiteController extends CommonController {
    public function index(){ //站点信息设置
		if	(empty($_POST)){
			$siteInfo = M('site')->find(1);
			$this->assign('siteInfo',$siteInfo);
			$this->display();
		}else{
			$site   = M('site');
			$data   = $site -> create();
			if (empty('eval')){
				unset($data['eval']);
			}
			if (empty($_FILES['logo']['name'])){
				unset($data['logo']);
			}else{
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728;// 设置附件上传大小 /1024/1024 = 3MB
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =     'public/'.C('fileDir'); // 设置附件上传根目录
				$info   		   =     $upload->upload();
				if(!$info){
					// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{
					// 上传成功
					$data['logo']  = C('fileDir').$info['logo']['savepath'].$info['logo']['savename'];
				}	
			}
			$result = $site
			->where('id=1')
			->save($data);
			if ($result){
				$this->success('数据更新成功');
			}else{
				$this->error('数据更新失败');
			}
		}
    }
	public function setUrl(){ //URL模式设置
		if (empty($_POST['submit'])){			
			$this -> display('Site/url');
		}else{
			$type        = is_numeric($_POST['type'])?$_POST['type']:$this->error('参数非法'); //过滤数据
			if ($type==0 or $type==1 or $type==2 or $type==3){
				$config 	 = file_get_contents(CONF_PATH.'url_config.php'); //读取配置文件
				$config      = $config==false?$this->error('打开配置文件失败'):$config;
				$pattern 	 = "/[0-9],\/\/URL配置/"; //正则 
				$replacement = "{$type},//URL配置";  //写入数据
				$replacement = preg_replace($pattern,$replacement, $config);
				$replacement = empty($replacement)?$this->error('更改模式失败,请检查正则'):$replacement;
				file_put_contents(CONF_PATH.'url_config.php',$replacement);
				$this->success('正在处理中',U('Admin/Site/jmp'));
			}else{
				$this->error('没有这个模式');
			}

		}
	}
	public function jmp(){
		$this->success('更改成功',U('Admin/Site/setUrl'));
	}
}