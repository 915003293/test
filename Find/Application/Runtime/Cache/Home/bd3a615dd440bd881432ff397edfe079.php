<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf8'/>
		<title><?php echo ($siteInfo["sitetitle"]); ?>-登录</title>
		<meta name="description" content="<?php echo ($siteInfo["sitedescribe"]); ?>"> 
		<meta name="keyword" content="<?php echo ($siteInfo["sitekeyword"]); ?>"> 
		<link rel='stylesheet' type='text/css' href='/find/Public/style/Registered.css'/>
		<script type='text/javascript' src='/find/Public/style/jquery-1.9.0.js' ></script>
		<script type='text/javascript'>
			$(function(){ 
				$("#rand").click(function(){
					var rand1 = Math.floor(Math.random() * 9999 + 1);
					$('#code').attr('src',"<?php echo U('login/code',array('r',"+$rand1+"));?>");
				})
			});
		</script>
	</head>
	<body>
		<?php echo ($siteInfo["eval"]); ?>
		<div id='header'>
			<div class='wrap add'>
				<a href="<?php echo U('index/index');?>"}'><img src='/find/Public/<?php echo ($siteInfo["logo"]); ?>'/></a>
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
				<div class='block'>
					<div class='box'>
						<div class='title'>登錄</div>
						<div class='content'>
							<div class='Registered'>
								<div class='left'>
									<div class='block1'><img src='/find/Public/style/info.png' />请登录后再继续浏览</div>
									<div class='block2'>
											<form action="<?php echo U('login/login');?>" method='post'>
												<p><span class='msg'>帐号：</span><input name='user' type='text' /><span class='fj'>*</span></p>
												<p><span class='msg'>密码：</span><input name='pswd' type='text' /><span class='fj'>*</span></p>
												<p><span class='msg'>验证码：</span><input name='code' type='text' /><span class='fj'>*</span></p>
												<p>
												
												  <img  class='code' id='code'  alt="验证码" src="<?php echo U('login/code');?>" title="点击刷新"> 
												<br/>
												<a class='code' style=' cursor:pointer' id='rand' style='color: #105cb6;'>换一张</a>
												</p>
											<input class='submit' name='submit' type='submit' value='登錄' />
										</form>
									</div>
								</div>
								<div class='right'>	
									<p>沒有帳號?</p>
									<a href='#' ><button>立即註冊</button></a>
									<a href='#' ><button>找回密码</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='wrap'>
			<div id='footer'>
							<p>管理员邮箱<?php echo ($siteInfo["adminemail"]); ?></p>
			<p>by:封建 基于thinkPHP框架的一个论坛 </p>
			</div>
		</div>
	</body>
</html>