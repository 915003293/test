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
				<li class="uk-active "><button class='uk-button uk-button-primary uk-button-large' >环境检测</button></li>
				<li class="uk-active "><button class='uk-button uk-button-large' >站点信息设置</button></li>
				<li class="uk-active "><button class='uk-button uk-button-large' >安装</button></li>
			</ul>
		</nav>
		<div style="height:915px;background-position:center; background-image:url('http://pic.3h3.com/up/2015-1/20151117170929141600.jpg');   background-size: cover; width:100%">
			<div style='color:#fff; padding:10px;' class='uk-width-1-2 uk-container-center'>
				<div class='uk-h1' style='margin-bottom:20px;'>环境检测</div>
				<div class='uk-h3'>运行环境检测</div>
				<table class="uk-table ">
					<tr style='font-weight: bold;'>
						<td>
							项目
						</td>
						<td>
							所需配置
						</td>
						<td>
							当前配置
						</td>
					</tr>
					<?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<?php echo ($vo["name"]); ?>
							</td>
							<td>
								<?php echo ($vo["need"]); ?>
							</td>
							<td>
								<?php if($vo["ok"] == true ): ?><img style='position:relative; top:-1px;' src='/Find/Public/Install/inco/G.png' />
								<?php else: ?>
									<img style='position:relative; top:-1px;' src='/Find/Public/Install/inco/X.png' /><?php endif; ?>
								
								<?php echo ($vo["now"]); ?>
							</td>
							
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				<div class='uk-h3'>目录读写权限</div>
				<table class="uk-table ">
					<tr style='font-weight: bold;'>
						<td>
							目录/文件
						</td>
						<td>
							所需权限
						</td>
						<td>
							当前权限
						</td>
					</tr>
					<?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<?php echo ($vo["path"]); ?>
							</td>
							<td>
								<?php echo ($vo["need"]); ?>
							</td>
							<td>
								<?php if($vo["ok"] == true ): ?><img style='position:relative; top:-1px;' src='/Find/Public/Install/inco/G.png' />
								<?php else: ?>
									<img style='position:relative; top:-1px;' src='/Find/Public/Install/inco/X.png' /><?php endif; ?>
								
								<?php echo ($vo["now"]); ?>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				<p class=''><a class="uk-button uk-button-success " href="<?php echo U('Index/index',array('step'=>3));?>">下一步</a> <a class="uk-button uk-button-danger" href="<?php echo U('Index/index',array('step'=>1));?>">上一步</a></p>
			</div>
		</div>
    </body>
</html>