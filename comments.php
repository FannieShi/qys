<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
?>
<?php if (comments_open()) :?>
<article class="comment">
	<h3 class="title">
		<span>发表评论</span>
	</h3>
	<?php comment_form(
		array(
		    'fields' => array(
			    'author' => '<div class="inputs"><input type="text" aria-required="true" size="30" value="'.$comment_author.'" name="author" id="author" placeholder="*您的昵称">',
			    'email' => '<input type="text" aria-required="true" size="30" value="'.$comment_author_email.'" name="email" id="email" placeholder="*电子邮件（不会被公开）">',
			    'url' => '<input type="text" size="30" value="'.$comment_author_url.'" name="url" id="url" placeholder="个人网站"></div>'),
			'comment_field' =>  '<div class="textarea"><textarea id="comment" name="comment" placeholder="既然来了，说点什么吧..." aria-required="true"></textarea></div>',
			'comment_notes_before' => '',
			'title_reply' => '',
			'title_reply_to' => __( '回复  %s　' ),
			'logged_in_as' => ''
		)
	);?>
	<!--<div class="commentForm">
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentForm" name="commentForm">
			<div class="textarea">
				<textarea name="comment" placeholder="既然来了，说点什么吧..."></textarea>
			</div>
			<div class="inputs">
				<?php if (!is_user_logged_in()) : ?>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="*您的昵称"/>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="*电子邮件（不会被公开）"/>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="个人网站"/>
				<?php endif; ?>					
				<button type="submit">发表评论</button>
			</div>
		</form>
	</div>-->
</article>
<?php endif; ?>
<article class="comment">
	<h3 class="title">
		<span>评论列表</span>
	</h3>
	<ul class="commentContent">
		<?php if (!comments_open()) {     
	    ?>
	    <li class="decmt-box">
	        <p><a href="#addcomment">评论功能已经关闭!</a></p>
	    </li>
	    <?php 
	        } else if ( !have_comments() ) { 
	    ?>
	    <li class="decmt-box">
	        <p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
	    </li>
	    <?php 
	        } else {
	            wp_list_comments('type=comment&callback=qys_comment');
	        }
	    ?>	
	</ul>
</article>