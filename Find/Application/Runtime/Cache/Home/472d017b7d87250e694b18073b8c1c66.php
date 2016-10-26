<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf8'/>
		<title><?php echo ($siteInfo["sitetitle"]); ?>-帖子</title>
		<meta name="description" content="<?php echo ($siteInfo["sitedescribe"]); ?>"> 
		<meta name="keyword" content="<?php echo ($siteInfo["sitekeyword"]); ?>"> 
		<link rel='stylesheet' type='text/css' href='/Find/Public/style//article.css'/>
		<link rel='stylesheet' type='text/css' href='/Find/Public/style//page.css'/>
		<link rel="stylesheet" type="text/css" href="/Find/Public/style/wangEditor-2.1.18/dist/css/wangEditor.min.css">
		<script type='text/javascript' src='/Find/Public/style//jquery-1.9.0.js' ></script>
		<script type="text/javascript" src="/Find/Public/style/wangEditor-2.1.18/dist/js/wangEditor.min.js"></script>
		<script type='text/javascript'>
			$(function(){
				var editor = new wangEditor('textarea1');
				editor.create();
				$('#submit').click(function(){
				
					 var formatText = editor.$txt.formatText();
					console.info(formatText);
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
				<div class='box'>
					<div class='title'>面包屑导航</div>
					<div class='content'>
						<img id='position' src='/Find/Public/style/postion.png' />
							<a href="<?php echo U('index/index');?>">首页</a>> 
							<?php if(is_array($path)): $i = 0; $__LIST__ = $path;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["n"] == true ): ?><a href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>&nbsp;>
									<?php else: ?>
									<a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>&nbsp;><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
					<?php if($ArticleInfo != null): ?><div class='article'>
							<div class='left'>
								<div><img  src='/Find/Public/style/img/user1/<?php echo ($ArticleInfo[2]["img"]); ?>' /></div>
								<div><img class='userLogo' src='/Find/Public/style//user.png' /><b><?php echo ($ArticleInfo[2]["user"]); ?></b></div>
								<div>
									<?php switch($ArticleInfo[2]["type"]): case "0": ?>论坛会员<?php break;?>
										<?php case "1": ?>管理员<?php break;?>
										<?php default: ?>非法会员<?php endswitch;?>
								</div>
								<div><img src="http://www.phpwind.net/themes/site/link2015/images/level/20.gif" alt="管理员"></div>
								<div>發帖數：<?php echo ($ArticleInfo[2]["i"]); ?></div>
								<div>註冊日期：<?php echo ($ArticleInfo[2]["createdate"]); ?></div>
								<div>最後登錄：<?php echo ($ArticleInfo[2]["enddate"]); ?></div>
							</div>
							<div class='right'>
								<div class='title'>
									<div class='left'>
										<span style='color:red;'>[<?php echo ($ArticleInfo[1]["title"]); ?>]</span><?php echo ($ArticleInfo[0]["title"]); ?>
	<!-- 									<img class='img1' src='/Find/Public/style//3.png' />
										<img class='img1' src='/Find/Public/style//huo.png' />
										<img class='img1' src='/Find/Public/style//deng.png' /> -->
									</div>
									<div class='right'>
										<div>閱讀：<?php echo ($ArticleInfo[0]["i"]); ?> | 回帖：<?php echo ($ArticleInfo[0]["ii"]); ?></div>
									</div>
								</div>
								<div class='mid'>
								<div class='left'><?php echo ($ArticleInfo[0]["createdate"]); ?></div>
								<div class='right'>楼主</div>
								</div>
								<div class='content'>
									<?php echo ($ArticleInfo[0]["content"]); ?>
								</div>
							</div>
						</div><?php endif; ?>
					<?php if(is_array($replyListInfo)): $k = 0; $__LIST__ = $replyListInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class='article'>
							<div class='left'>
								<div><img  src='/Find/Public/style/img/user1/<?php echo ($vo["user"]["img"]); ?>' /></div>
								<div><img class='userLogo' src='/Find/Public/style//user.png' /><b><?php echo ($vo["user"]["user"]); ?></b></div>
								<div>
								<?php switch($vo["user"]["type"]): case "0": ?>论坛会员<?php break;?>
									<?php case "1": ?>管理员<?php break;?>
									<?php default: ?>非法会员<?php endswitch;?>
								</div>
								<div><img src="http://www.phpwind.net/themes/site/link2015/images/level/20.gif" alt="管理员"></div>
								<div>發帖數：<?php echo ($vo["user"]["i"]); ?></div>
								<div>註冊日期：<?php echo ($vo["user"]["createdate"]); ?></div>
								<div>最後登錄：<?php echo ($vo["user"]["enddate"]); ?></div>
							</div>
							<div class='right'>
								<div class='mid'>
								<div class='left'>发布：<?php echo ($vo["createdate"]); ?></div>
									<div class='right'>
									<?php if($pageNum == 1): switch($k): case "1": ?>沙发<?php break;?>
											<?php case "2": ?>板凳<?php break;?>
											<?php default: echo ($k); ?>楼<?php endswitch;?>
									<?php else: ?>
										<?php switch($k): default: echo ($pageNum*5-5+$k); ?>楼<?php endswitch; endif; ?>
									</div>
								</div>
								<div class='content'>
										<?php echo ($vo["content"]); ?>
										<DIV style='clear:both; margin-bottom:20px;'></Div>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class='page'>
					<ul>
					<?php echo ($page); ?>
					</ul>
				</div>
				<DIV style='clear:both; margin-bottom:20px;'></Div>
				
				<div id='post'>
					<form action="<?php echo U('Article/postReply');?>" method='post' >
						<textarea name='text' style='height:250px;max-height:250px;' id="textarea1"></textarea>
						<div><input type='submit' value='发帖' id = 'submit'></div>
						<input type='hidden' name='articleId' value='<?php echo ($articleId); ?>'/>
					</form>
	
				</div>
			<DIV style='clear:both; margin-bottom:20px;'></Div>
					
	

					
			<div id='footer'>
							<p>管理员邮箱<?php echo ($siteInfo["adminemail"]); ?></p>
			<p>by:封建 基于thinkPHP框架的一个论坛 </p>
			</div>
			</div>	
		</div>

	</body>
</html>