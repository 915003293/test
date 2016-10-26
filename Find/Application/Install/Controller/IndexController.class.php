<?php
namespace Install\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		//安装文件被删除
		switch($_GET['step']){
			case 1:
				$this -> display('step1');
				$_SESSION['step'] = 2;
			break;
			case 2:
				if($_SESSION['step']<2){
					$this -> error('请按照步骤来,乱改参数是不好的行为');
				}
				$_SESSION['error'] = false;
				$this -> checkConfig();
				$this -> checkFile();

				$_SESSION['step'] = 3;
				$this -> display('step2');
			break;
			case 3:
				if($_SESSION['step']<3){
					$this -> error('请按照步骤来,乱改参数是不好的行为');
				}
				if($_SESSION['error']){
					$this -> error('环境检测不通过');
				}
				$this -> display('step3');
			break;			
			default:
				$this -> display('step1');
				$_SESSION['step'] = 2;
		}
    }
	public function install(){
	if(empty($_POST)){
			$this -> error('想不阅读安装协议？',U('index/index'));
		}else{
			if($_SESSION['step']<3){
				$this -> error('请按照步骤来,乱改参数是不好的行为');
			}
			if($_SESSION['error']){
				$this -> error('环境检测不通过');
			}
			if(!is_file('install.php')){
				$this -> error('想重新安装？在根目录添加安装文件吧',U('Admin/Login/login'));
			}else{
				$this -> create();
			}
		}
	}
	public function create(){

		if(empty($_POST['host']) or empty($_POST['dbUser']) or empty($_POST['dbName'])   or empty($_POST['port']) or empty($_POST['prefix']) or empty($_POST['user']) or empty($_POST['pswd']) or empty($_POST['okPswd'])  ){
				$this -> error('数据填完整了？');
			}
			if($_POST['pswd'] != $_POST['okPswd']){
				$this -> error('管理员密码不一致');
			}
			$con = mysqli_connect($_POST['host'],$_POST['dbUser'],$_POST['dbPswd'],null,$_POST['port']);
			if(mysqli_connect_errno($con)){
				//连接失败
				switch(mysqli_connect_errno($con)){
					case 1045:
						$this -> error('数据库密码或用户名错误');
					break;
					default:
						$this -> error('未知错误');
				}
			}else{
				//连接成功
				$sql = "CREATE DATABASE IF NOT EXISTS `{$_POST['dbName']}` DEFAULT CHARACTER SET utf8";
				mysqli_query($con,$sql);
				if(mysqli_error($con )==''){
					//置库
					mysqli_select_db($con,$_POST['dbName']);
					//读取SQL文件
					$sql = file_get_contents('public/Install/data/sql.sql');
					//替换回车为换行
					$sql = str_replace("\r", "\n", $sql);
					//转换成数组
					$sql = explode(";\n", $sql);
					//替换前缀
					$sql = str_replace("think_", "{$_POST['prefix']}", $sql);
					if(!empty($sql)){
						$top = <<<HTML
						<!DOCTYPE html>
						<html>
							<head>
								<title></title>
								<link rel="stylesheet" href="public/Install/css/uikit.min.css" />
								<script src="public/Install/js/jquery.js"></script>
								<script src="public/Install/js/uikit.min.js"></script>
							</head>
							<body>
								<nav style='padding:10px;' class="uk-navbar">
									<ul class="uk-navbar-nav uk-grid-small">
										<li class="uk-active "><button class='uk-button uk-button-large' >安装协议</button></li>
										<li class="uk-active "><button class='uk-button uk-button-large' >环境检测</button></li>
										<li class="uk-active "><button class='uk-button uk-button-large' >站点信息设置</button></li>
										<li class="uk-active "><button class='uk-button uk-button-primary  uk-button-large' >安装</button></li>
									</ul>
								</nav>
								<div style="height:915px;background-position:center; background-image:url('http://pic.3h3.com/up/2015-1/20151117170929141600.jpg');   background-size: cover; width:100%">
									<div style='color:#fff; padding:10px;' class='uk-width-1-2 uk-container-center'>
											<div class='uk-h1' style='margin-bottom:20px;'>正在安装中</div>
HTML;
						$footer = <<<FOOTER
										
									</div>
								</div>
								</body>
								</html>
FOOTER;
						echo $top;
						//执行SQL语句建表
						foreach($sql as $key => $val){
							$this -> prinf('正在执行'.$val);
							mysqli_query($con,$val);
							if(mysqli_errno($con)!=0){
								$this -> error('建表出错 $sql'.$val);
							}
						}
						//执行SQL语句注册管理员
						$_POST['pswd'] = sha1(md5($_POST['pswd']));
						$sql = <<<SQL
								INSERT into `{$_POST['prefix']}user` (`user`,`pswd`,`createdate`,`enddate`,`type`,`exp`,`ip`)
								VALUES('{$_POST['user']}','{$_POST['pswd']}',now(),now(),1,9999,'{$_SERVER['REMOTE_ADDR']}');
SQL;
						$this -> prinf('正在执行'.$val);
						mysqli_query($con,$sql);
						if(mysqli_error($con)!=''){
							$this -> error('注册管理员失败');
						}else{
							$this -> prinf('注册管理员ok');
						}
						//建表完成
						$config = <<<CONFIG
						<?php
							return array(
								'DB_TYPE'   		 => 'mysql', // 数据库类型
								'DB_HOST'   		 => '{$_POST['host']}',// 服务器地址
								'DB_NAME'  			 => '{$_POST['dbName']}',// 数据库名
								'DB_USER'  			 => '{$_POST['dbUser']}',// 用户名
								'DB_PWD'   			 => '{$_POST['dbPswd']}',// 密码
								'DB_PORT'  			 =>  {$_POST['port']},// 端口
								'DB_PREFIX' 		 => '{$_POST['prefix']}',// 数据库表前缀 
								'DB_CHARSET'		 => 'utf8',// 字符集
								'DB_DEBUG'  		 =>  false,// 数据库调试模式 开启后可以记录SQL日志
							);
CONFIG;
						if(file_put_contents('Application/Common/Conf/db_config.php',$config)){
							if(unlink('install.php')){
								$this -> prinf('OK');
								sleep(3);
								$this -> success('安装成功',U('jmp'));
								echo $footer;
							}else{
								$this -> error('删除安装文件失败');
							}
							
						}else{
							$this -> error('写出配置信息失败');
						}
					}else{
						$this -> error('读取SQL文件失败');
					}
				}else{
					$this -> error('创建数据库失败');
				}
			}
	}
	//检测配置
	public function checkConfig(){
		$infoArr = array(
			'os' => array(
				'name' => '操作系统',
				'need' => '不限',
				'now'  => PHP_OS,
				'ok'   => true,
			),
			'php' => array(
				'name' => 'PHP版本',
				'need' => 5.3,
				'now'  => PHP_VERSION,
				'ok'   => null,
			),
			'gd' => array(
				'name' => 'GD库',
				'need' => '开启',
				'now'  => 0,
				'ok'   => null,
			),
			'file' => array(
				'name' => '文件上传',
				'need' => '开启',
				'now'  => null,
				'ok'   => null,
			),
		);
		//检测PHP
		if(PHP_VERSION>=$infoArr['php']['need']){
			$infoArr['php']['ok'] = true;
		}else{
			$infoArr['php']['ok'] = false;
			$_SESSION['error']    = true;
		}
		//检查GD库
		if(function_exists('gd_info')){
			$gdInfo = gd_info();
			$infoArr['gd']['now'] = $gdInfo['GD Version'];
			$infoArr['gd']['ok']  = true;
		}else{
			$infoArr['gd']['now'] = '未开启';
			$infoArr['gd']['ok']  = false;
			$_SESSION['error']    = true;
		}
		//文件上传检测
		if(ini_get('file_uploads')){
			$maxSize = ini_get('upload_max_filesize');
			$infoArr['file']['now'] = $maxSize;
			$infoArr['file']['ok']  = true;
		}else{
			$infoArr['file']['now'] = '未开启';
			$infoArr['file']['ok']  = false;
			$_SESSION['error']    	= true;
		}
		$this -> assign('data1',$infoArr);
	}
	//检查文件和目录读写权限
	public function checkFile(){
		$dirInfoArr = array(
			array(
				'type' => 'dir',
				'path' => 'public/file',
				'need' => '读/写',
				'now'  => '不可读写',
				'ok'   =>  false,
				),
			array(
				'type' => 'dir',
				'path' => 'Application/Common/Conf',
				'need' => '读/写',
				'now'  => '不可读写',
				'ok'   =>  false,
				),
			array(
				'type' => 'file',
				'path' => 'Application/Common/Conf/db_config.php',
				'need' => '读/写',
				'now'  => '不可读写',
				'ok'   =>  false,
				),
			array(
				'type' => 'file',
				'path' => 'Application/Common/Conf/url_config.php',
				'need' => '读/写',
				'now'  => '不可读写',
				'ok'   =>  false,
				),
				
		);
		foreach($dirInfoArr as $key => $val ){
			//文件目录是否存在
			if(file_exists($val['path'])){
				//存在则检测是否可读
				if(is_readable($val['path'])){
					$dirInfoArr[$key]['now'] = '读';
					//是否可写
					if(is_writable($val['path'])){
						$dirInfoArr[$key]['now'] = '读/写';
						$dirInfoArr[$key]['ok']  = true;
					}else{
						$dirInfoArr[$key]['now'] = '不可写';
						$_SESSION['error'] 	= true;	
					}
				}else{
					$dirInfoArr[$key]['now'] = '不可读';
					$_SESSION['error'] = true;
				}
			}else{
				$dirInfoArr[$key]['now'] = '目录/文件 不存在';
				$_SESSION['error'] = true;
			}
		}
		$this -> assign('data2',$dirInfoArr);
	}
	public function prinf($msg){
		echo $msg,"<br/>";
		flush();
		ob_flush();
		sleep(0.7);
	}
	public function jmp(){
		header("Location:index.php");
	}
}