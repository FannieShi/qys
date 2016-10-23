<?php
	//防止恶意调用
	if(!defined('IN_TG')){
		exit('Access Denied!');
	}
	$url = $_SERVER['PHP_SELF'];
	$filename = basename($_SERVER['PHP_SELF']);
?>
<!--整个网站色调掉为绿色-->
<header class="header">
	<div class="wrap">
		<div class="logo">
			<a href="index.html">
				<h1>七月上</h1>
			</a>
		</div>
		<nav class="nav">
			<ul>
				<li><a href="index.php">首页</a></li>
				<li><a href="about.php">关于我</a></li>
				<li><a href="blog.php">前端小记</a></li>
				<li><a href="life.php">生活碎碎念</a></li>
				<li><a href="message.php">留言板</a></li>
			</ul>
		</nav>
	</div>	
</header>	
<script type="text/javascript">
	var current = '<?php echo $filename?>';
	$('nav a').each(function(){
		if($(this).attr('href') == current){
			$(this).parent().addClass('active');
		}
	});
</script>