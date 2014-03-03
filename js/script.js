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
function loadList(id){
	location.href='#list';
	var query = "php/list.php?listID=" + id;
	$.getJSON(query,function(result){
		var content,i;
		content = "<div class='ui-grid-a ui-responsive'>";
		for (i=0; i<result.length; i++) {
			if (i % 2) {
				content += "<div class='ui-block-b'>";
			} else {
				content += "<div class='ui-block-a'>";
			}
			content += "<div class='arc ui-shadow ui-corner-all'><p class='title'>";
			content += result[i].title;
			content += "</p><div class='box'><img src='";
			content += result[i].img;
			content += "'/></div><p class='more'>";
			content += result[i].more;
			content += "</p></div></div>";
		};
		content += 	"</div></div>";
		$("#list").html(content);
	});
};