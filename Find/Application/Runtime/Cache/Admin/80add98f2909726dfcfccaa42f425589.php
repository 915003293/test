<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>find-修改分类</title>
    <link href="/admin/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/admin/Public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/admin/Public/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="/admin/Public/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/admin/Public/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/admin/Public/css/animate.css" rel="stylesheet">
    <link href="/admin/Public/css/style.css" rel="stylesheet">


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

<!-- end left -->
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>修改分类</h2>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
         <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <!-- <h5>All form elements <small>With custom checbox and radion elements.</small></h5> -->
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
                <div class="ibox-content">
                    <div class="hr-line-dashed"></div>
                    <form method="post" class="form-horizontal" action="<?php echo U('Type/Edit',array('id'=>$arr['id']));?>">
                        <div class="form-group has-success"><label class="col-sm-4 control-label">分类名称</label>

                            <div class="col-sm-3"><input type="text" class="form-control" name="title" required value = "<?php echo ($info["title"]); ?>"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-4 control-label">上级分类</label>

                            <div class="col-sm-3">
                                <select name="pid" class="form-control m-b">
                                    <option value="0">顶级分类</option>
									<?php if(is_array($arr)): foreach($arr as $key=>$vo): if($vo["id"] != $info['id']): ?><option   value="<?php echo ($vo["id"]); ?>" <?php if($vo["id"] == $info['pid']): ?>selected<?php endif; ?> >										
												<?php echo ($vo["title"]); ?>
											</option><?php endif; endforeach; endif; ?>
                                </select>
								<input type='hidden' value="<?php echo ($info['id']); ?>" name='id' />
                            </div>
                        </div>
                      <!--   <div class="hr-line-dashed"></div> -->
  <!--                               <div class="form-group has-success"><label class="col-sm-4 control-label">分类样式</label>

                                    <div class="col-sm-3">
                                            <select name="type" id="" class="form-control">
                                                <option value="1" <?php if($arr["type"] == '1'): ?>selected<?php endif; ?>>普通样式</option>
                                                <option value="2" <?php if($arr["type"] == '2'): ?>selected<?php endif; ?>>音乐样式</option>
                                                <option value="3" <?php if($arr["type"] == '3'): ?>selected<?php endif; ?>>电影样式</option>
                                                <option value="4" <?php if($arr["type"] == '4'): ?>selected<?php endif; ?>>心情样式</option>
                                            </select>
                                    </div>
                                </div> -->
                        <div class="ibox-content">
                            <div class="text-center">
                                <input type="submit" value="保存" class="btn btn-primary" data-toggle="modal">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- start footer -->

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
    <script src="/admin/Public/js/jquery-2.1.1.js"></script>
    <script src="/admin/Public/js/inspinia.js"></script>
    <script src="/admin/Public/js/bootstrap.min.js"></script>
    <script src="/admin/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/admin/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/admin/Public/js/plugins/flot/jquery.flot.js"></script>
    <script src="/admin/Public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/admin/Public/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/admin/Public/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/admin/Public/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/admin/Public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/admin/Public/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->

    <script src="/admin/Public/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/admin/Public/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/admin/Public/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/admin/Public/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/admin/Public/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/admin/Public/js/plugins/chartJs/Chart.min.js"></script>
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

<!-- end footer -->
</div>