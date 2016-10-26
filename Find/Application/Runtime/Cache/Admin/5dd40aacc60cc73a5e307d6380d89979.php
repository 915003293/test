<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>find-URL模式設置</title>
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
                    <h2>URL模式設置</h2>
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
                            <form method="post" class="form-horizontal" action="<?php echo U('Site/setUrl');?>" enctype="multipart/form-data">
							  <div class="form-group has-success"><label class="col-sm-4 control-label">当前URL模式</label>
                                    <div class="col-sm-4">
										   <select name="type" class="form-control">
                                                <option value="0" <?php if(C('URL_MODEL') == '0'): ?>selected<?php endif; ?>>普通模式</option>
                                                <option value="1" <?php if(C('URL_MODEL') == '1'): ?>selected<?php endif; ?>>PATHINFO模式</option>
                                                <option value="2" <?php if(C('URL_MODEL') == '2'): ?>selected<?php endif; ?>>伪静态( REWRITE模式)</option>
                                                <option value="3" <?php if(C('URL_MODEL') == '3'): ?>selected<?php endif; ?>>兼容模式</option>
                                            </select>
									</div>	
									<div class="col-sm-4">
										<input type='submit' name='submit' class="btn btn-success" />
								    </div>	
                                </div>
                                <center>
                                </center>
                                <br>
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            普通模式
                                        </div>
                                        <div class="panel-body">
                                            <p>普通模式也就是传统的GET传参方式来指定当前访问的模块和操作，例如： http://localhost/?m=home&c=user&a=login&var=value</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            PATHINFO模式
                                        </div>
                                        <div class="panel-body">
                                            <p>PATHINFO模式是系统的默认URL模式，提供了最好的SEO支持，系统内部已经做了环境的兼容处理，所以能够支持大多数的主机环境。对应上面的URL模式，PATHINFO模式下面的URL访问地址是： http://localhost/index.php/home/user/login/var/value/</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            REWRITE模式
                                        </div>
                                        <div class="panel-body">
                                            <p>REWRITE模式是在PATHINFO模式的基础上添加了重写规则的支持，可以去掉URL地址里面的入口文件index.php，但是需要额外配置WEB服务器的重写规则。

如果是Apache则需要在入口文件的同级添加.htaccess文件，内容如下：

    <IfModule mod_rewrite.c>
     RewriteEngine on
     RewriteCond %{REQUEST_FILENAME} !-d
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
    </IfModule>

接下来，就可以用下面的URL地址访问了： http://localhost/home/user/login/var/value</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            兼容模式
                                        </div>
                                        <div class="panel-body">
                                            <p>兼容模式是用于不支持PATHINFO的特殊环境，URL地址是： http://localhost/?s=/home/user/login/var/value</p>
                                        </div>
                                    </div>
                                </div>
                               <div class="ibox-content">
                            <div class="text-center">
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