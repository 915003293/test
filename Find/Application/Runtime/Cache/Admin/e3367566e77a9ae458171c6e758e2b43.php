<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>find-用户组管理</title>
    <link href="/Find/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Find/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/Find/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/Find/Public/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="/Find/Public/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/Find/Public/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/Find/Public/css/animate.css" rel="stylesheet">
    <link href="/Find/Public/css/style.css" rel="stylesheet">


</head>
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
</style>
<body>
    <div id="wrapper">

        <!-- start left -->

      <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">find</strong>
                             </span> <span class="text-muted text-xs block"><?php echo (cookie('user')); ?> <b class="caret"></b></span> </span> </a>
                        </div>
                    </li>
                    <li class="active">
                <a href="<?php echo U('Index/index');?>"><i class="fa fa-diamond"></i> <span class="nav-label">后台首页</span> <span class="label label-primary pull-right">NEW</span></a>
            </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">网站设置</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="<?php echo U('Site/index');?>">网站管理</a></li>
                           <!--  <li ><a href="<?php echo U('Email/index');?>">网站邮件设置</a></li> -->
                            <li ><a href="<?php echo U('Site/setUrl');?>">URL模式設置</a></li>
                            <!-- <li ><a href="<?php echo U('Adminer/index');?>">管理员修改</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">友情链接</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Friendlink/index');?>">查看友链</a></li>
                            <li><a href="<?php echo U('Friendlink/add');?>">添加友链</a></li>
                        </ul>
                    </li>
					
					
					
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">网站分类管理</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Type/index');?>">查看分类</a></li>
                            <li ><a href="<?php echo U('Type/add');?>">添加分类</a></li>
                        </ul>
                    </li>
<!--                     <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">首页幻灯片管理</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Slides/index');?>">查看幻灯片</a></li>
                            <li ><a href="<?php echo U('Slides/add');?>">添加幻灯片</a></li>
                        </ul>
                    </li> -->

                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">文章管理</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Article/index');?>">文章管理</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">会员管理</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('User/index');?>">会员管理</a></li>	
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">权限管理</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Jurisdiction/goup');?>">用户组管理</a></li>	
                            <li><a href="<?php echo U('Jurisdiction/index');?>">权限管理</a></li>	
                        </ul>
                    </li>
                <li>
                    <a href="<?php echo U('Login/unLogin');?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
        <div class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                    </nav>
                </div>
            </div>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>用户组管理</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户组列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
					<form action="<?php echo U('User/handle');?>" method='post'>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>用户组</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($user)): foreach($user as $k=>$vo): ?><tr class="gradeU">
                        <td>
							<input type="checkbox" class='checkbox1' name = "selected[]"  style='height:30px;width:50px;' value='<?php echo ($vo["id"]); ?>'>
						</td>
                        <td><?php echo ($vo["user"]); ?></td>
                        <td><?php echo ($vo["pswd"]); ?></td>
                        <td>
                        <td><?php if($vo["type"] == 2): ?><span class="label label-danger">禁用</span><?php else: ?><span  class="label label-info">启用</span><?php endif; ?></td>
                        <td>					
                       
						   <?php if($vo["type"] == 2): ?><a href="<?php echo U('User/enableOne',array('id'=>$vo['id']));?>"><button type="button" class="btn btn-default btn-lg glyphicon glyphicon glyphicon glyphicon-record"></button></a>
						   <?php else: ?>
							  <a href="<?php echo U('User/banOne',array('id'=>$vo['id']));?>"><button type="button" class="btn btn-default btn-lg glyphicon glyphicon glyphicon-ban-circle"></button></a><?php endif; ?>
                           <a href="<?php echo U('User/edit',array('id'=>$vo['id']));?>"><button type="button" class="btn btn-default btn-lg glyphicon glyphicon-pencil"></button></a>                        
						   <a  onclick = "return shifou();"><button type="button" class="btn btn-default btn-lg glyphicon glyphicon-remove" data-toggle="modal" data-target="#myModa<?php echo ($vo['id']); ?>"></button></a>
                        </td>
                    </tr>
						<div class="modal fade" id="myModa<?php echo ($vo['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">find-删除会员</h4>
							  </div>
							  <div class="modal-body">
								你确定要删除:<?php echo ($vo['user']); ?>吗？
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
								<a href="<?php echo U('User/delete',array('id'=>$vo['id']));?>" /><button type="button"  class="btn btn-primary">OK</button></a>
							  </div>
							</div>
						  </div>
						</div><?php endforeach; endif; ?>
                    </tbody>
					
					<!-- Standard button -->
					<button type="button" style='margin-right:10px;' id='onSelected' class="btn btn-default">反选</button>
					<!-- Standard button -->
					<button type="button" style='margin-right:10px;' id='selected' class="btn btn-default">全选</button>
					<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
					<input type='submit' name='type'  style='margin-right:10px;' class="btn btn-primary" value='删除'/>
					<input type='submit' name='type'  style='margin-right:10px;' class="btn btn-danger"  value='禁用'/>
					<input type='submit' name='type'  style='margin-right:10px;' class="btn btn-success" value='启用'/>
                    </table>
					<div style='position:relative; top:-15px;'>
					<?php echo ($page); ?>
					</div>
                    </div>
					</form>
                </div>
            </div>
            </div>
                    
<div class="footer">
    <div class="pull-right">
        
    </div>
    <div>
        <strong>by封建</strong> find论坛 &copy; 2016
    </div>
</div>
</div>

</body>
</html>
           <!-- Mainly scripts -->
    <script src="/Find/Public/js/jquery-2.1.1.js"></script>
    <script src="/Find/Public/js/inspinia.js"></script>
    <script src="/Find/Public/js/bootstrap.min.js"></script>
    <script src="/Find/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Find/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/Find/Public/js/plugins/flot/jquery.flot.js"></script>
    <script src="/Find/Public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/Find/Public/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/Find/Public/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/Find/Public/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/Find/Public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/Find/Public/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->

    <script src="/Find/Public/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/Find/Public/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/Find/Public/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/Find/Public/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/Find/Public/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/Find/Public/js/plugins/chartJs/Chart.min.js"></script>
<script>
        var s_url=window.location.pathname;
        var now_url = '';
        for(var i = 0;i<$("#side-menu li").length;i++){
            now_url=$("#side-menu li a").eq(i).attr("href");
            if(now_url == s_url){
                $("#side-menu a").eq(i).parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().addClass("in");
            }else{
                $("#side-menu a").eq(i).parent().removeClass("active");
            }
        }
        </script>
    <!-- Toastr -->

        </div>
		<script>
		$(function(){
			$('#selected').click(function(){
				$('.checkbox1').prop('checked',true);
			});
			$('#onSelected').click(function(){
				$('.checkbox1').prop('checked',false);
			});
		})
		</script>