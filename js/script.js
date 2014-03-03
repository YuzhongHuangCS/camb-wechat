//	Cambridge Community Wechat Platform by PillowSky
$(document).ready(function(){
	$(function(){
	  var mySwiper = $('.swiper-container').swiper({
	    mode:'horizontal',
	    loop: true,
	    autoplay: 5000,
	    pagination: '.pagination',
	  });
	});
	imgReady('http://camb-image.stor.sinaapp.com/slider/slider1.jpg', function(){
		$(".swiper-container").height(window.innerWidth * this.height / this.width);
	});
	$(window).resize(function() {
		imgReady('http://camb-image.stor.sinaapp.com/slider/slider1.jpg', function(){
			$(".swiper-container").height(window.innerWidth * this.height / this.width);
		});
	});
});
function loadList(listID){
	location.href='#list';
	$.getJSON('php/list.php', {listID: listID}, function(json){
		var content='', i;
		for (i=0; i<json.length; i++) {
			if (i % 2) {
			content += '<div class="ui-block-b">';
			} else {
			content += '<div class="ui-block-a">';
			}
			content +=		'<div class="arc ui-shadow ui-corner-all" onclick=loadPost(' + json[i].listID + ',' + json[i].rank + ')>';
			content +=			'<p class="title">' + json[i].title + '</p>';
			content +=			'<div class="box"><img src="' + json[i].img + '"/></div>';
			content += 			'<p class="more">' + json[i].more + '</p>';
			content += 		'</div>';
			content += '</div>';
		};
		$("#listContent").html(content);
	});
};
function loadPost(listID, rank){
	location.href='#post';
	$.getJSON('php/post.php', {listID: listID, rank: rank}, function(json){
		var content, i;
		content =	'<h3 class="ui-bar ui-bar-a ui-corner-all">' + json[0].title + '</h3>';
		for(i=0; i<json[0].img.length; i++){
		content +=	'<img src="' + json[0].img[i] + '"/>';
		}
		content += json[0].text;
		$("#postContent").html(content);
	});
};