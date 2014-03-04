<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>剑桥公社微信平台</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="http://cdn.bootcss.com/jquery-mobile/1.4.1/jquery.mobile.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="http://cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/jquery-mobile/1.4.1/jquery.mobile.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/lib.min.js"></script>
</head>
<body>
<?php
require('php/init.php');
$sql = "SELECT * FROM `slider` ORDER BY `slider`.`rank`";
$result = mysql_query($sql, $con);
$slider = array();
while($r = mysql_fetch_assoc($result)){
	$slider[] = $r;
};
$sql = "SELECT * FROM `grid` ORDER BY `grid`.`rank`";
$result = mysql_query($sql, $con);
$grid = array();
while($r = mysql_fetch_assoc($result)){
	$grid[] = $r;
};
mysql_close($con);
//start layout
$content = '<div data-role="page" id="index" class="index">' .
				'<div class="swiper-container">' .
					'<div class="swiper-wrapper">';
for($i = 0; $i < count($slider); $i++){
$content .=				'<div class="swiper-slide">' .
							'<img src="' . ($slider[$i]['img']) . '"/>' .
						'</div>';
}
$content .=			'</div>' .
					'<div class="pagination"></div>' .
				'</div>';
//slider end, grid start
$content .=		'<div class="ui-grid-a ui-responsive">';
for($i = 0; $i < count($grid); $i++){
	if($i % 2){
$content .=			'<div class="ui-block-b">';
	} else{
$content .=			'<div class="ui-block-a">';
}
$content .=				'<div class="arc ui-shadow ui-corner-all" onclick=' . ($grid[$i]['action']) . '>' .
							'<div><img src="' . ($grid[$i]['img']) . '"/></div>' .
							'<p>' . ($grid[$i]['text']) . '</p>' .
						'</div>' .
					'</div>';
}
$content .=		'</div>';
$content .=		'<div class="footer"></div>';
$content .=	'</div>';
echo($content);
//index page end
?>
<div data-role="page" id="list" class="list">
	<div data-role="navbar" data-grid="c" class="ui-body-b ui-shadow navbar">
    	<ul>
    	   	<li><a class="ui-btn ui-btn-icon-left ui-icon-carat-l" onclick="history.back()">返回</a></li>
    	   	<li><a href="/" class="ui-btn ui-btn-icon-left ui-icon-home">首页</a></li>
    	   	<li><a href="#" class="ui-btn ui-btn-icon-left ui-icon-phone">热线</a></li>
    	  	<li><a href="#" class="ui-btn ui-btn-icon-left ui-icon-bullets">导航</a></li>
		</ul>
	</div>
	<div class="ui-grid-a ui-responsive" id="listContent"></div>
</div>
<div data-role="page" id="post" class="post">
	<div data-role="navbar" data-grid="c" class="ui-body-b ui-shadow navbar">
    	<ul>
    	   	<li><a class="ui-btn ui-btn-icon-left ui-icon-carat-l" onclick="history.back()">返回</a></li>
    	   	<li><a href="/" class="ui-btn ui-btn-icon-left ui-icon-home">首页</a></li>
    	   	<li><a href="#" class="ui-btn ui-btn-icon-left ui-icon-phone">热线</a></li>
    	  	<li><a href="#" class="ui-btn ui-btn-icon-left ui-icon-bullets">导航</a></li>
		</ul>
	</div>
	<div class="ui-body ui-corner-all content" id="postContent"></div>
	<div class="ui-bar ui-corner-all footer">
		<button class="ui-btn ui-btn-inline ui-corner-all ui-shadow ui-btn-icon-left ui-icon-action">发送给朋友</button>
		<button class="ui-btn ui-btn-inline ui-corner-all ui-shadow ui-btn-icon-left ui-icon-myicon ui-nodisc-icon">分享到朋友圈</button>
		<button class="ui-btn ui-btn-b ui-corner-all ui-shadow" style="width:100% " onclick="$('html,body').animate({scrollTop: 0})">返回顶部</button>
	</div>
</div>
</body>
</html>