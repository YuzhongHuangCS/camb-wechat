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
//$con = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
$con = mysql_connect('localhost','www-data');
if (!$con){
	die(mysql_error());
}
mysql_query("set character set 'utf8'");
//mysql_select_db(SAE_MYSQL_DB, $con);
mysql_select_db("camb", $con);
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
echo'<div data-role="page" id="index" class="index">';
echo	'<div class="swiper-container">';
echo		'<div class="swiper-wrapper">';
for($i = 0; $i < count($slider); $i++){
echo			'<div class="swiper-slide">';
echo				'<img src="'; echo ($slider[$i]['img']); echo '"/>';
echo			'</div>';
}
echo		'</div>';
echo		'<div class="pagination"></div>';
echo	'</div>';
//slider end, grid start
echo	'<div class="ui-grid-a ui-responsive">';
for($i = 0; $i < count($grid); $i++){
	if($i % 2){
echo		'<div class="ui-block-b">';
	} else{
echo		'<div class="ui-block-a">';
	}
echo			'<div class="arc ui-shadow ui-corner-all" onclick='; echo ($grid[$i]['action']); echo '>';
echo				'<div><img src="'; echo ($grid[$i]['img']); echo '"/></div>';
echo				'<p>'; echo ($grid[$i]['text']); echo '</p>';
echo			'</div>';
echo		'</div>';
}
echo	'</div>';
echo	'<div class="footer"></div>';
echo'</div>';
//index page end
?>
<div data-role="page" id="list" class="list"></div>
<div data-role="page" id="post" class="post"></div>
</body>
</html>