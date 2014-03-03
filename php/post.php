<?php
$listID = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);
$rank = filter_input(INPUT_GET, "rank", FILTER_SANITIZE_NUMBER_INT);
//$con = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
$con = mysql_connect('localhost','www-data');
if (!$con){
	die(mysql_error());
}
mysql_query("set character set 'utf8'");
//mysql_select_db(SAE_MYSQL_DB, $con);
mysql_select_db("camb", $con);
$sql = 'SELECT * FROM `post` WHERE `listID` = ' . $listID . ' AND `rank` = ' . $rank;
$result = mysql_query($sql, $con);
mysql_close($con);
$row = array();
while($r = mysql_fetch_assoc($result)){
	foreach ($r as $key => $value) {
		if($key == 'img'){
			$r['img'] = explode(', ',$r['img']);
			foreach ($r['img'] as $subkey => $subvalue) {
				$r[$key][$subkey] = urlencode($subvalue);
			}
		}
		else{
			$r[$key] = urlencode($value);
		}
	}
	$row[] = $r;
}
$json = urldecode(json_encode($row));
header('Content-Type: application/json; charset=utf-8');
echo($json);
?>