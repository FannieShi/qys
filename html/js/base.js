$(function(){
	/*header*/
	$('.banner p').first().animate({'opacity':'1','filter':'alpha(opacity=100)'}
	,2000,'swing',function(){
		$('.banner p').last().animate({'opacity':'1','filter':'alpha(opacity=100)'},2000,'swing');
	});
	var $hd = $('.header');
	var $sTop1, $hTop = $hd.offset().top + $hd.height();
	$(window).bind('scroll',function(){
		var $sTop2 = $(window).scrollTop();
		if($sTop2 > $hTop){
			$hd.addClass('fixed');
			if($sTop2<$sTop1){
				$hd.addClass('show');
			}else{
				$hd.removeClass('show');			
			}
		}else {
			$hd.removeClass('fixed show');
		}
		$sTop1 = $(window).scrollTop();
	})
});