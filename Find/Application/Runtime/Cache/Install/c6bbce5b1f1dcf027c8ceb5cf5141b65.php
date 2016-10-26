<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>find-官方后台</title>

</head>

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
        <!-- start top -->
        
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>[title]</title>
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

        <!-- end top -->
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                        <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">会员总数</span>
                                <h5>会员数量</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo ($userNum); ?></h1>
                                <div class="stat-percent font-bold text-success">User<i class="fa fa-bolt"></i></div>
                                <small>本站会员总数</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">帖子数量</span>
                                <h5>帖子数量</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo ($articleNum); ?></h1>
                                <div class="stat-percent font-bold text-info">Article<i class="fa fa-level-up"></i></div>
                                <small>本站帖子总数</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">回帖数量</span>
                                <h5>回帖数量</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo ((isset($replyNum) && ($replyNum !== ""))?($replyNum):0); ?></h1>
                                <div class="stat-percent font-bold text-navy">Message<i class="fa fa-level-up"></i></div>
                                <small>本站回帖总数</small>
                            </div>
                        </div>
                    </div>
 <!--                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">评论数量</span>
                                <h5>评论数量</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo ($commentCount); ?></h1>
                                <div class="stat-percent font-bold text-danger">Comment<i class="fa fa-level-down"></i></div>
                                <small>本站评论总数</small>
                            </div>
                        </div>
            </div> -->
        </div>
        <div class="row">
        <div class="col-lg-2">
                    <div class="widget navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-shield fa-4x"></i>
                            <h1 class="m-xs">Power</h1>
                            <h3 class="font-bold no-margins">
                                作者
                            </h3>
                            <small>信息</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                        <div class="widget-head-color-box navy-bg p-lg text-center">
                            <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                封建
                            </h2>
                                <small>求工作</small>
                            </div>
                            <img src="http://www.thinkphp.cn/Public/new/img/header_logo.png" class="img-circle circle-border m-b-md" alt="profile" width="128px;">
                            <div>
                                <span>求职中</span> 
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading">他说</h4>
                            <p>还没有什么想说的</p>
                        </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget lazur-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs">Blog</h1>
                            <h3 class="font-bold no-margins">
                                程序
                            </h3>
                            <small>信息</small>
                        </div>
                    </div>
                    </div>
                <div class="col-lg-4">
                    <div class="widget lazur-bg p-xl">
                                <h2>
                                    find论坛系统
                                </h2>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <label>当前系统版本：</label>
                                V1.0
                            </li>
                            <li>
                                <label>后端：封建</label>
                            </li>
                            <li>
                                <label>特别感谢：</label>
                                <label>thinkPHP</label>
                                <label>里程密作者</label>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        <div class="row">
        <div class="col-lg-2">
                    <div class="widget yellow-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-shield fa-4x"></i>
                            <h1 class="m-xs">System</h1>
                            <h3 class="font-bold no-margins">
                                系统
                            </h3>
                            <small>信息</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget yellow-bg p-xl">
                                <h2>
                                    操作系统：<?php echo C('system');?> 
                                </h2>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <label>apache:</label>
								<?php echo C('apache');?> 
                            </li>
                            <li>
                                <label>根目录:</label>
								/Find  
                            </li>
                            <li>
                                <label>服务器IP：</label>
								<?php echo ($_SERVER['REMOTE_ADDR']); ?>
                            </li>
                            <li>
                                <label>服务器域名：</label>
								<?php echo ($_SERVER['HTTP_HOST']); ?>
                            </li>
                            <li>
                                <label>服务器语言：</label>
								<?php echo ($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?>
                            </li>
                            <li>
                                <label>服务器WEB端口：</label>
								<?php echo ($_SERVER['SERVER_PORT']); ?>
                            </li>
                            <li>
                                <label>服务器当前时间：</label>
                                <?php echo (time($time)); ?>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget red-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs">PHP</h1>
                            <h3 class="font-bold no-margins">
                                程序
                            </h3>
                            <small>信息</small>
                        </div>
                    </div>
                    </div>
                <div class="col-lg-4">
                    <div class="widget red-bg p-xl">
                                <h2>
                                    PHP版本：<?php echo C('php');?> 
                                </h2>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <label>上传最大限制：</label>
                                <?php echo C('fileMax');?> 
                            </li>
                            <li>
                                <label>错误是否打开：</label>
                                <?php echo C('error');?> 
                            </li>
                        </ul>

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
        </div>

        </div>

    </div>
</body>
</html>