<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=yes">
<title><?php 
		if ( is_home() ) {
        		bloginfo('name'); echo " - "; bloginfo('description');
    		} elseif ( is_category() ) {
        		single_cat_title(); echo " - "; bloginfo('name');
    		} elseif (is_single() || is_page() ) {
       			 single_post_title(); echo " - "; bloginfo('name');
    		} elseif (is_search() ) {
        		echo "搜索结果"; echo " - "; bloginfo('name');
   		} elseif (is_404() ) {
        		echo '页面未找到!';
    		} else {
        		wp_title('',true);
   		 } ?>
</title>
<?php
	$description = '';
	$keywords = '';

	if (is_home() || is_page()) {
   		$description = "七月上,石帆的个人原创博客。";
		$keywords = "七月上,FannieShi,Fannie Shi,web前端,个人博客,石帆,编程";
	}
	elseif (is_single()) {
   		$description1 = get_post_meta($post->ID, "description", true);
  		$description2 = get_the_excerpt();

  		// 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
   		$description = $description1 ? $description1 : $description2;
   
   		// 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
  		$keywords = get_post_meta($post->ID, "keywords", true);
   		if($keywords == '') {
      			$tags = wp_get_post_tags($post->ID);    
      			foreach ($tags as $tag ) {        
         			$keywords = $keywords . $tag->name . ", ";    
      			}
     			$keywords = rtrim($keywords, ', ');
   		}
	}
	elseif (is_category()) {
   		// 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
   		$description = category_description();
   		$keywords = single_cat_title('', false);
	}
	elseif (is_tag()){
   		// 标签的description可以到后台 - 文章 - 标签，修改标签的描述
   		$description = tag_description();
   		$keywords = single_tag_title('', false);
	}
	$description = trim(strip_tags($description));
	$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
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
					<li><a title="Home" href="<?php echo get_option('home'); ?>/">首页</a></li>
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
	var currentCat = '<?php 
						if(is_category() || is_single()) {
							$category = get_the_category(); 
							echo $category[0]->cat_name;
						}elseif(is_home()){ ?> '+'首页' +'<?php } ?>';
	$('nav a').each(function(){		
		if(currentUrl.indexOf($(this).attr('href')) != -1 || ($(this).html().indexOf(currentCat) != -1) && (currentCat != '')){
			$(this).parent().addClass('active').siblings().removeClass('active');
		}
	});
</script>