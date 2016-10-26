<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf8'/>
		<title><?php echo ($siteInfo["sitetitle"]); ?>-发帖</title>
		<meta name="description" content="<?php echo ($siteInfo["sitedescribe"]); ?>"> 
		<meta name="keyword" content="<?php echo ($siteInfo["sitekeyword"]); ?>"> 
		<link rel='stylesheet' type='text/css' href='/Find/Public/style//article.css'/>
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
					<div class='title'>發帖</div>
					<div class='content'>
					<form action="<?php echo U('Article/post');?>" method='post' >
					    
							<select name='plate' style='font-size:15px;width:250px;padding:5px;'>
								<?php if(is_array($postList)): $i = 0; $__LIST__ = $postList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($articleid); ?>
									<?php if(($vo["id"]) == $articleid): ?><option selected value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["title"]); ?></option>
									<?php else: ?>
										<option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<select>
						<input  name='title' style='width:550px;padding:5px;margin-bottom:10px; font-size:15px;' placeholder='这里填写标题' type='text'/>
						<textarea  name='text' style='height:550px;max-height:550px;' id="textarea1"></textarea>
						<div><input style='padding:10px; margin-top:5px;' name='submit' type='submit' value='发帖' id = 'submit'></div>
					</form>
					</div>
				</div>

				<div class='box'>
					<div class='title'>友情鏈接</div>
					<div class='content'>
						<?php if($linkList == null ): ?>暫時沒有友情鏈接
						<?php else: ?>
							<?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class='link'><a href='<?php echo ($vo["link"]); ?>'><?php echo ($vo["title"]); ?> </a></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</div>
			</div>
		</div>
		<div id='footer'>
							<p>管理员邮箱<?php echo ($siteInfo["adminemail"]); ?></p>
			<p>by:封建 基于thinkPHP框架的一个论坛 </p>
		</div>
	</body>
</html>