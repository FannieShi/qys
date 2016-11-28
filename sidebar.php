<aside class="sidebar">
	<!--个人信息-->
	<div class="qys">
		<div class="qys-img">
			<img src="<?php bloginfo('template_url'); ?>/imgs/img05.jpg" alt="" />
			<div class="about">
				<a href="<?php bloginfo('template_url'); ?>/about">关于七月上</a>
			</div>
		</div>
		<?php if (is_category() || is_single()){ ?>
			<!--搜索框-->
			<div class="search">
				<form action="<?php bloginfo('url'); ?>/" target="_blank">
					<input id="s" name="s" value="<?php the_search_query(); ?>" type="text" placeholder="输入关键词搜索相关文章" />
					<button type="submit"></button>
				</form>
			</div>
		<?php }else{ ?>
			<!--外链网易云音乐-->
			<div class="qys-music">
				<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=297 height=86 src="http://music.163.com/outchain/player?type=2&id=31445554&auto=0&height=66"></iframe>
			</div>
			<div class="qys-intro">
				<p class="icon1">姓名：七月上｜Fannie Shi</p>
				<p class="icon2">职业：Web前端开发</p>
				<p class="icon3">籍贯：湖北省-黄冈市</p>
				<p class="icon4">邮箱：me@fannieshi.com</p>
				<p class="icon5">GitHub：<a href="https://github.com/FannieShi">FannieShi</a></p> 	
			</div>
			<!--外链新浪微博-->
			<div class="qys-sina">
				<h3>
					<span>新浪微博</span>
				</h3>
				<iframe width="100%" height="90" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=350&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=0&uid=2647637494&verifier=72a768f2&colors=71c4a7,66a690,fff,eee,66a690&dpc=1"></iframe>
			</div>
		<?php }?>
	</div>
	<?php if (!is_page()) { ?>
		<!--文章列表-->
		<div class="lists hot">
			<h3>
				<span>点击排行</span>
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
		<div class="lists new">
			<h3>
				<span>最新文章</span>
			</h3>
			<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				<?php elseif (is_single()) : ?>
					<!--显示首页下的最新文章-->
					<?php get_archives('postbypost', 10); ?>
				<?php else : ?>
					<li>还没有发表文章</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="lists">
			<h3>
				<span>友情链接</span>
			</h3>
			<dl>
				<dd>
					<a href="http://www.ycku.com" target="_blank">瓢城Web俱乐部</a>
				</dd>
				<dd>
					<a href="http://www.zhangxinxu.com" target="_blank">张鑫旭-鑫空间-鑫生活</a>
				</dd>
				<dd>
					<a href="http://www.ruanyifeng.com/home.html" target="_blank">阮一峰的个人网站</a>
				</dd>
				<dd>
					<a href="http://www.xuanfengge.com" target="_blank">轩枫阁</a>
				</dd>
			</dl>
		</div>
	<?php } ?>
			
