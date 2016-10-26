<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find管理系统</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </head>
  <body style='background-color:#f9f9f9;'>
	<nav class="navbar navbar-default" style='margin:0px;' role="navigation">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Find管理系统</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<?php if(is_array($topNavList)): $i = 0; $__LIST__ = $topNavList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Nav/swt',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">administrative <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">注销</a></li>
				<li><a href="#">One more separated link</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div style='margin:0px;' class="row">
	  <div class="col-lg-2">
		<div style='margin-top:10px;' class="list-group">
			<?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Nav/swt',array('id'=>$vo['id'],'f'=>true));?>" class="list-group-item"><?php echo ($vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	  </div>
	  <div class="col-lg-10" >
		<div class="row" style='padding:10px;'>
			 <div class="col-lg-4">
				 <div class="panel panel-default">
				  <div class="panel-body" >
					<span class="label pull-right label-success">User</span>
					<span><B>会员数</B></span>
				  </div>
				  <div class="panel-footer">
					<h3>1</h3>
					<small>本站会员数</small>
					<div class='pull-right stat-percent font-bold text-success' >UsernameNuber</div>
				  </div>
				 </div>
			 </div>
			 <div class="col-lg-4">
				 <div class="panel panel-default">
				  <div class="panel-body" >
					<span class="label pull-right label-success">Article</span>
					<span><B>帖子数</B></span>
				  </div>
				  <div class="panel-footer">
					<h3>1</h3>
					<small>本站帖子数</small>
					<div class='pull-right stat-percent font-bold text-success' >ArticleNuber</div>
				  </div>
				 </div>
			 </div>
			 <div class="col-lg-4">
				 <div class="panel panel-default">
				  <div class="panel-body" >
					<span class="label pull-right label-success">Replies</span>
					<span><B>回帖数</B></span>
				  </div>
				  <div class="panel-footer">
					<h3>1</h3>
					<small>本站回帖数</small>
					<div class='pull-right  text-success' >RepliesNuber</div>
				  </div>
				 </div>
			 </div>
			 <div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="panel-heading">
					  <span>程序信息</span>
					  <span class='pull-right label label-success'>1</span>
				  </div>
				  <div class="panel-body">
					<ul class="list-group">
					  <li class="list-group-item list-group-item-danger">欢迎使用Find后台管理系统</li>
					  <li class="list-group-item list-group-item-warning">系统版本:1.0</li>
					  <li class="list-group-item list-group-item-success">作者：封建</li>
					  <li class="list-group-item list-group-item-info">联系方式：qq:915003293  Email：915003293@qq.com</li>
					</ul>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					  <span>系统信息</span>
					  <span class='pull-right label label-success'>2</span>
				  </div>
				  <div class="panel-body">
					<ul class="list-group">
					  <li class="list-group-item list-group-item-success">操作系统：Windows NT</li>
					  <li class="list-group-item list-group-item-info">PHP版本：5.5.12</li>
					  <li class="list-group-item list-group-item-warning">运行环境：apache2 handler</li>
					  <li class="list-group-item list-group-item-danger">GD库：On</li>
					  <li class="list-group-item list-group-item-success">文件上传：On</li>
					  <li class="list-group-item list-group-item-info">服务器IP： 127.0.0.1</li>
					  <li class="list-group-item list-group-item-warning">服务器域名： localhost</li>
					  <li class="list-group-item list-group-item-danger">服务器语言： zh-CN,zh;q=0.8</li>
					  <li class="list-group-item list-group-item-success">服务器当前时间： 1473916862</li>
					</ul>
				  </div>
				</div>
			</div>
		</div>
	  </div>
	</div>
  </body>
</html>