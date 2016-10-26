<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="/Find/Public/Install/css/uikit.min.css" />
        <script src="/Find/Public/Install/js/jquery.js"></script>
        <script src="/Find/Public/Install/js/uikit.min.js"></script>
    </head>
    <body>
		<nav style='padding:10px;' class="uk-navbar">
			<ul class="uk-navbar-nav uk-grid-small">
				<li class="uk-active "><button class='uk-button uk-button-large' >安装协议</button></li>
				<li class="uk-active "><button class='uk-button uk-button-large' >环境检测</button></li>
				<li class="uk-active "><button class='uk-button uk-button-primary uk-button-large' >站点信息设置</button></li>
				<li class="uk-active "><button class='uk-button uk-button-large' >安装</button></li>
			</ul>
		</nav>
		<div style="height:915px;background-position:center; background-image:url('http://pic.3h3.com/up/2015-1/20151117170929141600.jpg');   background-size: cover; width:100%">
			<div style='color:#fff; padding:10px;' class='uk-width-1-2 uk-container-center'>
				<form action="<?php echo U('index/Install');?>" method='post'>
					<div class='uk-h1' style='margin-bottom:20px;'>站点信息设置</div>
					<div class='uk-h3'>数据库配置</div>
					<div style='margin:5px;'><input  name='host' value='localhost' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据库服务器，数据库服务器IP，一般为localhost</div>
					<div style='margin:5px;'><input  name='dbName' value='find' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据库名称</div>
					<div style='margin:5px;'><input  name='dbUser' value='root' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据库用户名</div>
					<div style='margin:5px;'><input  name='dbPswd' value='' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据库密码</div>
					<div style='margin:5px;'><input  name='port'value='3306' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据库端口,一般为3306</div>
					<div style='margin:5px;'><input  name='prefix' value='think_' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 数据表前缀，同一个数据库运行多个系统时请修改为不同的前缀</div>
					<div class='uk-h3'>管理员配置</div>
					<div style='margin:5px;'><input  name='user'  value='admin' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 管理员帐号</div>
					<div style='margin:5px;'><input  name='pswd' value='admin' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 管理员帐号密码</div>
					<div style='margin:5px;'><input  name='okPswd' value='admin' style='padding:5px;border-radius: 4px; border:none;' type='text'/> 确认密码</div>
					<p class=''><input  class="uk-button uk-button-success " value='安装' type='submit' /></a> <a class="uk-button uk-button-danger" href="<?php echo U('Index/index',array('step'=>2));?>">上一步</a></p>
				</form>
			</div>
		</div>
    </body>
</html>