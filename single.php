<?php get_header(); ?>		
<div class="main">
	<div class="crumbs">
		<a href="<?php echo get_option('home'); ?>/">首页</a>
		<i>/</i>
		<?php the_category(', '); ?>
		<i>/</i>
		<?php the_title(); ?>
	</div>
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<article class="post">
		<h4 class="post-title"><?php the_title(); ?></h4>
		<div class="post-info">
			<span class="post-author"><?php the_author(); ?></span>
			<span class="post-date"><?php the_time('Y-m-d') ?></span>
			<span class="post-date"><?php the_time('H:i') ?></span>
			<span class="edit"><?php edit_post_link('编辑',''); ?></span>	
			<span class="reply"><?php comments_popup_link('0', '1', '%', '', '评论已关闭'); ?></span>
			<span class="views"><?php if(function_exists('the_views')) { the_views(); } ?></span>
		</div>
		<div class="thumbnail">
			<?php 
				if (has_post_thumbnail()) { 
					the_post_thumbnail(); 
				}else{?>
					<img src="<?php bloginfo('template_url'); ?>/imgs/404.jpg" alt="default" />
			<?php } ?>
		</div>
		<!--content-->
		<div class="post-content">
            <?php the_content(); ?>
		</div>
	</article>
	<?php else : ?>
	<div class="errorbox">
	        没有文章！
	</div>
	<?php endif; ?>
	<!--评论板块-->
	<?php comments_template(); ?>
</div>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>	