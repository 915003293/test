<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf8'/>
		<title><?php echo ($siteInfo["sitetitle"]); ?>-板块列表</title>
		<meta name="description" content="<?php echo ($siteInfo["sitedescribe"]); ?>"> 
		<meta name="keyword" content="<?php echo ($siteInfo["sitekeyword"]); ?>"> 
		<link rel='stylesheet' type='text/css' href='/Find/Public/style/plate.css'/>
		<link rel='stylesheet' type='text/css' href='/Find/Public/style/page.css'/>
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
				<div class='box'>
					<div class='title'>面包屑导航</div>
					<div class='content'>
						<img id='position' src='/Find/Public/style/postion.png' />
						<a href="<?php echo U('index/index');?>">首页</a>> 
						<?php if(is_array($path)): $i = 0; $__LIST__ = $path;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["n"] == true ): ?><a href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>&nbsp;><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class='block'>
					<div class='left'>
						<div class='top'>
							<p class='title'><?php echo ($PlateInfo[0]["title"]); ?></p>
							<p><span>今日:<span class='b'><?php echo ($PlateInfo[0]["count1"]); ?></span></span> </span> <span>总帖：<span class='b'><?php echo ($PlateInfo[0]["count2"]); ?></span> </span> </p>
<!-- 							<p><span>版主:封建</span></p>
							<p><span>phpwind零距离接触,公布官方最新动态……</span></p> -->
							<?php if($subPlateList != null ): ?><div class='box'>
										<div class='title'>子板塊</div>
										<div class='content'>
											<div class='plate'>
											<?php if(is_array($subPlateList)): $i = 0; $__LIST__ = $subPlateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
													<div>
														<div class='left'><img src='http://www.phpwind.net/themes/site/link2015/images/forum/old.gif' /></div>
														<div class='right'>
															<div class='title'><a href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></div>
																<div >帖子:<span><?php echo ((isset($vo["sum"]) && ($vo["sum"] !== ""))?($vo["sum"]):'0'); ?></span></div>
																<div >最後發帖:<span><?php echo ((isset($vo["subDate"]) && ($vo["subDate"] !== ""))?($vo["subDate"]):'0'); ?></span></div>
														</div>
													</div>
												</div><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
								</div><?php endif; ?>

						
						</div>
						<div>
							<ul class='list'>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
										<div class='left'>
											<div class='left1'>
												<img src='/Find/Public/style/img/user/<?php echo ($vo["img"]); ?>' />
											</div>
											<div class='right1'>
												<div class='top1'>
													<img src='/Find/Public/style/Article.png' />
													<a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>"><span><?php echo ($vo["title"]); ?></span></a>
												</div>
												<div class='mid1'>
													楼主：<span><?php echo ($vo["user"]); ?> <?php echo ($vo["createdate"]); ?></span>  <!-- 最后回复：<span>hdw855508 2014 18:32</span>  -->
												</div>
											</div>
										</div>
										<div class='right'>
											<div>
												<p><?php echo ($vo["i"]); ?></p>
												<p>浏览</p>
											</div>
											<div>
												<p><?php echo ($vo["ii"]); ?></p>
												<p>回复</p>
											</div>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								<!-- <li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/3.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li>
								<li>
									<div class='left'>
										<div class='left1'>
											<img src='/Find/Public/style/user.jpg' />
										</div>
										<div class='right1'>
											<div class='top1'>
												<img src='/Find/Public/style/deng.png' />
												<a href='article.html'><span>PW移动社区9.0正式推出，开放公测（2015.11...</span></a>
											</div>
											<div class='mid1'>
												楼主：<span>PW相即 2015-03-11</span> 最后回复：<span>hdw855508 2014 18:32</span> 
											</div>
										</div>
									</div>
									<div class='right'>
										<div>
											<p>9999999</p>
											<p>浏览</p>
										</div>
										<div>
											<p>9999999</p>
											<p>回复</p>
										</div>
									</div>
								</li> -->
							</ul>
							<div><a href="<?php echo U('Article/post',array('id'=>$articleid));?>"'><button class='post' >发帖</button></a></div>
							<div class='page'>
								<ul>
								
								<?php echo ($page); ?>
<!-- 									<li><a href=''>首页</a></li>
									<li><a href='#'>上一页</a></li>
									<li class='selected'><a href='#'>1</a></li>
									<li><a href='#'>2</a></li>
									<li><a href='#'>3</a></li>
									<li><a href='#'>4</a></li>
									<li><a href='#'>5</a></li>
									<li><a href='#'>下一页</a></li>
									<li><a href='#'>尾页</a></li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class='right'>
						<p class='title'>板块列表</p>
						<div>
							<ul>
								<?php if($PlateList == null ): ?>論壇上還沒有板塊;
								<?php else: ?>
									<?php if(is_array($PlateList)): $i = 0; $__LIST__ = $PlateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class='sub1' href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li>
										
										<?php if($vo['sub'] == null ): ?>这个板块下还没有子板块
										<?php else: ?>
											<?php if(is_array($vo['sub'])): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><li><a class='sub' href="<?php echo U('Plate/GetsubClassArticle',array('id'=>$voo['id']));?>"><?php echo ($voo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
										<div class='hr'></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</ul>
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