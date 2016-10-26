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
			<div class="col-lg-12" >
				<div class="panel panel-default">
					  <div class="panel-heading">
						<span>导航条管理</span>
						<span class="pull-right label label-success">1</span>
					  </div>
					  <div class="panel-body">
						<!-- Standard button -->
						<button type="button" class="btn btn-default">全选</button>

						<!-- Standard button -->
						<button type="button" class="btn btn-default">反选</button>

						<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
						<button type="button" class="btn btn-primary">全部排序</button>

						<!-- Indicates a successful or positive action -->
						<button type="button" class="btn btn-success">全部启用</button>

						<!-- Indicates a dangerous or potentially negative action -->
						<button type="button" class="btn btn-warning">全部停用</button>

						<!-- Indicates a dangerous or potentially negative action -->
						<button type="button" class="btn btn-danger">全部删除</button>
						<table class="table table-striped">
							  <thead>
								<tr>
								  <th>ID</th>
								  <th>排序</th>
								  <th>名称</th>
								  <th>类型</th>
								  <th>操作</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td><input type='checkbox' style='height:20px; width:30px;' /></td>
								  <td><input  type='text' value='1' style='width:30px; text-align:center;' /></td>
								  <td>站点管理</td>
								  <td>顶级分类</td>
								  <td>
									<a href='#'><button class='glyphicon glyphicon glyphicon-paperclip'></button></a>
									<a href='#'><button class='glyphicon glyphicon glyphicon-pencil'></button></a>
									<a href='#'><button class='glyphicon glyphicon-remove'></button></a>
								  </td>
								</tr>
								<tr>
								  <td><input type='checkbox' style='height:20px; width:30px;' /></td>
								  <td><input  type='text' value='0' style='width:30px; text-align:center;' /></td>
								  <td>&nbsp;&nbsp;&nbsp;&nbsp;站点设置</td>
								  <td>子分类</td>
								  <td>
									<a href='#'><button class='glyphicon glyphicon glyphicon-paperclip'></button></a>
									<a href='#'><button class='glyphicon glyphicon glyphicon-pencil'></button></a>
									<a href='#'><button class='glyphicon glyphicon-remove'></button></a>
								  </td>
								</tr>
								<tr>
								  <td><input type='checkbox' style='height:20px; width:30px;' /></td>
								  <td><input  type='text' value='0' style='width:30px; text-align:center;' /></td>
								  <td>&nbsp;&nbsp;&nbsp;&nbsp;URL设置</td>
								  <td>子分类</td>
								  <td>
									<a href='#'><button class='glyphicon glyphicon glyphicon-paperclip'></button></a>
									<a href='#'><button class='glyphicon glyphicon glyphicon-pencil'></button></a>
									<a href='#'><button class='glyphicon glyphicon-remove'></button></a>
								  </td>
								</tr>
							  </tbody>
							</table>
							<nav>
							  <ul class="pagination">
								<li class="disabled"><a href="#">&laquo;</a></li>
								<li class=""><a href="#">1 <span class="sr-only">(current)</span></a></li>
								<li class="active"><a href="#">2 <span class="sr-only">(current)</span></a></li>
								<li class=""><a href="#">3 <span class="sr-only">(current)</span></a></li>
								<li class=""><a href="#">4 <span class="sr-only">(current)</span></a></li>
								<li class=""><a href="#">5 <span class="sr-only">(current)</span></a></li>
							  </ul>
							</nav>
					</div>
				</div>
			</div>
	  </div>
	</div>
 	</div>
  </body>
</html>