<?php get_header(); ?>		
<div class="main">
	<div class="bloglist">
		<div class="crumbs">
			<a href="<?php echo get_option('home'); ?>/">首页</a>
			<i>/</i>
			<?php echo $s; ?>
		</div>
		<!-- Blog Post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="blog">
			<h4>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<div class="thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php 
						if (has_post_thumbnail()) { 
							the_post_thumbnail(); 
						}else{?>
							<img src="<?php bloginfo('template_url'); ?>/imgs/404.jpg" alt="default" />
					<?php } ?> 
				</a>							
			</div>
			<div class="text">
				<?php the_excerpt(); ?>
				<p class="readmore">
					<a href="<?php the_permalink(); ?>" target="_blank">阅读全文&rsaquo;&rsaquo;</a>
				</p>					
			</div>
			<div class="info">
				<span>版块：[<?php the_category(', '); ?>]</span>
				<span>浏览（<a href="#" class="view"><?php if(function_exists('the_views')) { the_views(); } ?></a>）</span>
				<span>评论（<?php comments_popup_link('0', '1', '%', '', '评论已关闭'); ?>）</span>
				<span><?php edit_post_link('编辑', ' &bull; ', ''); ?></span>
			</div>
			<div class="dates">
				<?php the_time('Y-m-d') ?>
			</div>
			
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<article class="blog">
		 	<h4>
				<a href="#" rel="bookmark">Not Found!</a>
			</h4>
			<div class="thumbnail">
				<a href="<?php echo get_option('home'); ?>">
					<img src="<?php bloginfo('template_url'); ?>/imgs/404.jpg" alt="" />
				</a>							
			</div>
			<div class="text">
				<p>没有找到任何文章！</p>
			</div>
			<div class="info">
				<span>版块：[<a href="#">默认</a>]</span>
				<span>浏览（<a href="#" class="view">0</a>）</span>
				<span>评论（<a href="#" class="comment">已关闭</a>）</span>
			</div>
		</article>
		<div class="dates">
			<?php the_time('Y-m-d') ?>
		</div>
		<?php endif; ?>
		<!--分页导航-->
		<div class="pagenav">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?><br />	
		</div>
	</div>
</div>
<aside class="sidebar">
	<!--个人信息-->
	<div class="qys">
		<div class="qys-img">
			<img src="<?php bloginfo('template_url'); ?>/imgs/img05.jpg" alt="" />
			<div class="about">
				<a href="<?php bloginfo('template_url'); ?>/about">关于七月上</a>
			</div>
		</div>	
		<!--搜索框-->
		<div class="search">
			<form action="<?php bloginfo('url'); ?>/" target="_blank">
				<input id="s" name="s" value="<?php the_search_query(); ?>" type="text" placeholder="输入关键词搜索相关文章" />
				<button type="submit"></button>
			</form>
		</div>		
	</div>
	<!--文章列表-->
	<div class="lists new">
		<h3>
			<span>相关文章</span>
		</h3>
		<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			<?php elseif (is_single()) : ?>
				<!--显示首页下的最新文章-->
				<?php get_archives('postbypost', 10); ?>
			<?php else : ?>
				<li>没有相关文章</li>
			<?php endif; ?>
		</ul>
	</div>
	<div class="lists hot">
		<h3>
			<span>热门文章</span>
		</h3>
		<ul>
			<?php 
				if (is_category()){ 
					get_most_viewed_category(get_current_category_id()); 
				} 
				elseif (is_tag()){ 
					get_most_viewed_tag(get_current_tag_id()); 
				} 
				else { 
					get_most_viewed(); 
				} 
			?> 	
		</ul>
	</div>
	
<?php get_footer(); ?>	