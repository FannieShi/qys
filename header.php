<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=yes">
<title>七月上</title>
<meta name="description" content="七月上，专注于web前端开发技术、致力于前端开发工具资源的个人原创博客。">
<meta name="keywords" content="七月上,FannieShi,Fannie Shi,web前端,首页,热门文章"> 
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
<!--[if lt IE 9]> 
<script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer='+location.href;</script>
<![endif]-->
</head>
<?php flush(); ?>
<?php process_postviews(); ?>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="<?php echo get_option('home'); ?>/">
					<h1><?php bloginfo('name'); ?></h1>
				</a>
			</div>
			<nav class="nav">
				<ul>
					<li<?php if (is_home()) { echo ' class="active"';} ?>><a title="Home" href="<?php echo get_option('home'); ?>/">首页</a></li>
					<?php
						$currentcategory = '';
						
						// 以下这行代码用于在导航栏添加分类列表
						if  (is_category() || is_single()) {
						    $catsy = get_the_category();
						    $myCat = $catsy[0]->cat_ID;
						    $currentcategory = '&current_category='.$myCat;
						}
						wp_list_categories('depth=1&title_li=&show_count=0&hide_empty=0&child_of=0'.$currentcategory);
						
						// 以下这行代码用于在导航栏添加页面列表
						wp_list_pages('depth=1&title_li=&sort_column=menu_order');
					
					?>
				</ul>
			</nav>
		</div>	
	</header>
	<section class="banner container">
		<div class="text">
			<p>Smash fear, live and learn.</p>
			<p>无所畏惧，学无止境。</p>
		</div>
	</section>
	<section class="container clearfix table">	
<script type="text/javascript">
	var currentUrl = document.location.href;
	var currentCat = '<?php $category = get_the_category(); echo $category[0]->cat_name; ?>';
	$('nav a').each(function(){
		if(currentUrl.indexOf($(this).attr('href')) != -1 || $(this).html().indexOf(currentCat) != -1){
			$(this).parent().addClass('active').siblings().removeClass('active');
		}
	});
</script>