<?php
	add_theme_support('post-thumbnails');
	
	function get_current_category_id() { 
		$current_category = single_cat_title('', false);//获得当前分类目录名称 
		return get_cat_ID($current_category);//获得当前分类目录ID 
	} 
	function get_current_tag_id() { 
		$current_tag = single_tag_title('', false);//获得当前TAG标签名称 
		$tags = get_tags();//获得所有TAG标签信息的数组 
		foreach($tags as $tag) { 
			if($tag->name == $current_tag) return $tag->term_id; //获得当前TAG标签ID，其中term_id就是tag ID 
		} 
	} 	

	function qys_comment_add_at( $comment_text, $comment = '') {  
		if( $comment->comment_parent > 0) {  
			$comment_text = '@<a href="#li-comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;  
	  }  
	  
	  return $comment_text;  
	}  
	add_filter( 'comment_text' , 'qys_comment_add_at', 20, 2);

	function qys_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li id="li-comment-<?php comment_ID(); ?>">
			<div class="authorName">
				<?php printf(__('<span class="author">%s</span>'), get_comment_author_link()); ?>
				说：
				<span class="date">
					发表于 <?php echo get_comment_time('Y-m-d H:i'); ?> 
					&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>			
				</span>
			</div>
			<div class="commentText">
	        	<?php comment_text(); ?>
			</div>
			<div class="reply">
				<a href="#comments">回复　</a>
			</div>
		</li>
	<?php } ?>
