<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
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
			<li class="active"><a href="#">站点管理</a></li>
			<li><a href="#">分类管理</a></li>
			<li><a href="#">内容管理</a></li>
			<li><a href="#">会员管理</a></li>
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
		  <a href="#" class="list-group-item ">
			首页
		  </a>
		  <a href="#" class="list-group-item disabled">站点设置</a>
		  <a href="#" class="list-group-item">URL设置</a>
		  <a href="#" class="list-group-item">导航条管理</a>
		</div>
	  </div>
	  <div class="col-lg-10" >
		<div class="row" style='padding:10px;'>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<span>站点设置</span>
				<span class='pull-right label label-success'>1</span>
			  </div>
			  <div class="panel-body">
				<form action="#" method='post'>
					<div class="row">
						<div class="col-lg-12"style='margin-bottom:10px' >
						    <label for="siteTitle">站点标题</label>
							<input type="text" class="form-control" id="siteTitle" placeholder="siteTitle">
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
						    <label for="adminEmail">管理员邮箱</label>
							<input type="email" class="form-control" id="adminEmail" placeholder="adminEmail">
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
						    <label for="siteKeyWord">站点关键字</label>
							<textarea class="form-control" id='siteKeyWord' rows="3"></textarea>
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
						    <label for="siteDescribe">站点描述</label>
							<textarea class="form-control" id='siteDescribe' rows="3"></textarea>
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
						    <label for="Eval">统计代码</label>
							<textarea class="form-control" id='Eval' rows="3"></textarea>
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
							<label for="exampleInputFile">站点logo</label>
							<input type="file" id="exampleInputFile">
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
						   <p><label >开启访问</label></p>
						   <label class="radio-inline">
							  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> 开放
						   </label>
						   <label class="radio-inline">
							  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 关闭
						   </label>
						</div>
						<div class="col-lg-12"style='margin-bottom:10px' >
							<input type="submit" class="btn btn-danger" value='修改'/>
						</div>
					</div>
				</form>
			  </div>
			</div>
		</div>
	  </div>
	</div>
		</div>
	  </div>
	</div>
  </body>
</html>