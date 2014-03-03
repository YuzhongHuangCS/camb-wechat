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
<div data-role="page" id="index" class="index">
	<div class="swiper-container">
  		<div class="swiper-wrapper">
  			<?php
  			//$con = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
  			$con = mysql_connect("localhost","www-data");
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
			for($i = 0; $i < count($slider); $i++){
				echo "<div class='swiper-slide'><img src='";
				echo ($slider[$i]['img']);
				echo "'/></div>";
			}
	echo "</div><div class='pagination'></div></div><div class='ui-grid-a ui-responsive'>";
	$sql = "SELECT * FROM `grid` ORDER BY `grid`.`rank`";
	$result = mysql_query($sql, $con);
	$grid = array();
		while($r = mysql_fetch_assoc($result)){
			$grid[] = $r;
	};
	for($i = 0; $i < count($grid); $i++){
		if($i % 2){
			echo "<div class='ui-block-b'>";
		} else{
			echo "<div class='ui-block-a'>";
		}
		echo "<div class='arc ui-shadow ui-corner-all' onclick=";
		echo ($grid[$i]['action']);
		echo "><div><img src='";
		echo ($grid[$i]['img']);
		echo "'/></div><p>";
		echo ($grid[$i]['text']);
		echo "</p></div></div>";
	}
	mysql_close($con);
	?>
	</div>
	<div class="footer"></div>
</div>
<div data-role="page" id="list" class="list"></div>
<div data-role="page" id="post" class="post">
	<div data-role="navbar" data-grid="c" class="ui-body-b navbar">
    <ul>
        <li><a href="#" class="ui-btn-active">One</a></li>
        <li><a href="#">Two</a></li>
        <li><a href="#">Three</a></li>
        <li><a href="#">Four</a></li>
    </ul>
	</div>
    <div class="ui-body ui-corner-all content">
    	<h3 class="ui-bar ui-bar-a ui-corner-all">联系方式</h3>
    	<img src="http://www.weimob.com/templates/kindeditor/attached/00/74/91/image/20130823/20130823104950_82195.jpg" />
    	<img src="http://www.weimob.com/templates/kindeditor/attached/00/74/91/image/20130823/20130823104815_25515.jpg" />
    	<p>详细地址：上海静安区茂名北路65号</p>
    	<p>电　　话：4000377520</p>
    	<p>交通信息：地铁二号线南京西路站四号口步行5分钟，由于别墅区路段比较难找到位置，电话联系我们可提供出门接待服务停车信息：有停车场，由于车位紧张，必须提前电话预约客户可享免费停车位，我们会提前为您准备车位。</p>
    	<p>简　　介：通过免费咨询电话4000377520，提前预约进店即可赠送20份请帖，更可享套餐升级！</p>
    	<p style="color:DarkRed">友情提示：未在微博微信预约不享受店内任何优惠</p>
	</div>
	<div class="ui-bar ui-corner-all footer">
		<button class="ui-btn ui-btn-inline ui-corner-all ui-shadow ui-btn-icon-left ui-icon-action">发送给朋友</button>
		<button class="ui-btn ui-btn-inline ui-corner-all ui-shadow ui-btn-icon-left ui-icon-myicon ui-nodisc-icon">分享到朋友圈</button>
		<button class="ui-btn ui-btn-b ui-corner-all ui-shadow" style="width:100% " onclick="$('html,body').animate({scrollTop: 0})">返回顶部</button>
	</div>
</div>
</body>
</html>