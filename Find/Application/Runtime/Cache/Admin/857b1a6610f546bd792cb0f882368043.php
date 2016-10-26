<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>find-网站配置</title>
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
                            <li><a href="<?php echo U('Jurisdiction/group');?>">用户组管理</a></li>	
                            <li><a href="<?php echo U('Jurisdiction/rule');?>">权限管理</a></li>	
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

        </div>

         <!-- end left -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>网站配置</h2>
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
                            <form method="post" class="form-horizontal" action="<?php echo U('Site/index');?>" enctype="multipart/form-data">
                                <div class="form-group has-success"><label class="col-sm-4 control-label">站点标题</label>

                                    <div class="col-sm-8"><input type="text" class="form-control" name="siteTitle" required value = "<?php echo ($siteInfo["sitetitle"]); ?>"></div>
                                </div>
                                <div class="form-group has-success"><label class="col-sm-4 control-label">管理员邮箱</label>

                                    <div class="col-sm-8"><input type="text" class="form-control" name="adminEmail" required value = "<?php echo ($siteInfo["adminemail"]); ?>"></div>
                                </div>
                                <div class="form-group has-success"><label class="col-sm-4 control-label">网站关键字</label>
                                    <div class="col-sm-8"><textarea name = "siteKeyword" required class="form-control"><?php echo ($siteInfo["sitekeyword"]); ?></textarea></div>
                                </div>
                                <div class="form-group has-success"><label class="col-sm-4 control-label">网站描述</label>
                                    <div class="col-sm-8"><textarea name = "sitedescribe" required class="form-control"><?php echo ($siteInfo["sitedescribe"]); ?></textarea></div>
                                </div>
                                <div class="form-group has-success"><label class="col-sm-4 control-label">网站统计代码</label>
                                    <div class="col-sm-8"><textarea name = "eval" required class="form-control"><?php echo ($siteInfo["eval"]); ?></textarea></div>
                                </div>
                                <div class="form-group has-success"><label class="col-sm-4 control-label">网站LOGO</label>
                                    <div class="col-sm-3"><input type="file" name="logo"></div>
                                </div>
                                </div>
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

            <!-- end footer -->
        </div>