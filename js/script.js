//	Cambridge Community Wechat Platform by PillowSky
$(document).ready(function(){
	$(function(){
	  var mySwiper = $('.swiper-container').swiper({
	    mode:'horizontal',
	    loop: true,
	    autoplay: 5000,
	    pagination: '.pagination',
	  });
	})
	$(".swiper-container").height($(".swiper-slide").height());
});