<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf8'/>
		<title><?php echo ($siteInfo["sitetitle"]); ?>-主页</title>
		<meta name="description" content="<?php echo ($siteInfo["sitedescribe"]); ?>"> 
		<meta name="keyword" content="<?php echo ($siteInfo["sitekeyword"]); ?>"> 
		<link rel='stylesheet' type='text/css' href='/Find/Public/style/home.css'/>
		<script type='text/javascript' src='/Find/Public/style/jquery-1.9.0.js' ></script>
		<script type='text/javascript'>
			$(function(){
				$('#header  .wrap .nav1 li a').hover(function(){
					$(this).toggleClass('hover');
				});
				$('#main .boxE .top>span').click(function(){
					var id = $(this).index();
					$('#main .boxE .top>span').removeClass('hover selected');
					$(this).addClass('selected hover');
					$('#main .boxE>.main').css({'display':'none'}).eq(id).css({'display':'block'});
				});
			});
		</script>
	</head>
	<body>
		<?php echo ($siteInfo["eval"]); ?>
		<div id='header'>
			<div class='wrap add'>
				<a href="<?php echo U('index/index');?>"}'><img src='/Find/Public/<?php echo ($siteInfo["logo"]); ?>'/></a>
				<ul class='nav1'>
					<li class='hover'>
						<a href="<?php echo U('index/index');?>">首頁</a>
					</li>
					<li>
						<a href="<?php echo U('Article/post');?>">新貼</a>
					</li>
				</ul>
				<div class='right'>
					<?php if($user != ''): ?><span style='font-size:15px;'>欢迎回来:<?php echo ($user); ?></span>
						<a href="<?php echo U('Login/unCookie');?>">注销</a>
					<?php else: ?>
						<a href="<?php echo U('Registered/index');?>">註冊</a>
						<a href="<?php echo U('Login/index');?>">登錄</a><?php endif; ?>
				</div>
			</div>
		</div>
		<div id='main'>
			<div class='wrap'>
				<div class='boxE'>
					<div class='top'>
						<span class='selected hover'>热点动态</span>
						<span >选项卡2</span>
					</div>
					<div style='display:block;'  class='main x1'>
						<div class='left'>
							<?php if($NewArticleList == ''): ?>论坛气氛不够活跃,还没有文章啦
							<?php else: ?>
								<?php if(is_array($NewArticleList)): $i = 0; $__LIST__ = array_slice($NewArticleList,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><a class='plate' href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['pid']));?>"><span>[<?php echo ($vo["platetitle"]); ?>]</span></a><a class='article' href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" /> <span> <?php echo ($vo["title"]); ?> </span></a></p><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
						<div class='right'>
							<?php if($NewArticleList == ''): ?>论坛气氛不够活跃,还没有文章啦
							<?php else: ?>
								<?php if(is_array($NewArticleList)): $i = 0; $__LIST__ = array_slice($NewArticleList,5,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><a class='plate' href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['pid']));?>"><span>[<?php echo ($vo["platetitle"]); ?>]</span></a><a class='article' href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" /> <span> <?php echo ($vo["title"]); ?> </span></a></p><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
					</div>
					<div  class='main x2'>
						正在开发中，敬请期待
					</div>
					<!-- <div class='main'>main3</div> -->
				</div>
					<?php if($PlateList == ''): ?>论坛现在还没有板块，请建立一个板块
					<?php else: ?>
						<?php if(is_array($PlateList)): $i = 0; $__LIST__ = $PlateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='box'>
								<div class='title'><a href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></div>
								<div class='content'>
									<div class='plate'>
									<?php if($vo['sub'] == null ): ?>這個板塊還沒有子板塊
									<?php else: ?>
										<?php if(is_array($vo['sub'])): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><div>
													<div>
														<div class='left'><img src='http://www.phpwind.net/themes/site/link2015/images/forum/old.gif' /></div>
														<div class='right'>
															<div class='title'><a href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$voo['id']));?>"><?php echo ($voo["title"]); ?></a></div>
															<div >帖子:<span><?php echo ($voo["sum"]); ?></span></div>
															<div >最後發帖:<span><?php echo ((isset($voo["subDate"]) && ($voo["subDate"] !== ""))?($voo["subDate"]):'這個板塊還沒有帖子'); ?></span></div>
														</div>
													</div>
												</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</div>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<div class='box'>
					<div class='title'>友情鏈接</div>
					<div class='content'>
						<?php if($linkList == null ): ?>暫時沒有友情鏈接
						<?php else: ?>
							<?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class='link'><a href='<?php echo ($vo["link"]); ?>'><?php echo ($vo["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</div>
			</div>
		</div>
		<div id='footer'>
			<p>管理员邮箱<?php echo ($siteInfo["adminemail"]); ?></p>
			<p>by:封建 基于thinkPHP框架的一个论坛 </p>
		</div>
	</body>
</html>