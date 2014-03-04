<?php
require('init.php');
$listID = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);
$rank = filter_input(INPUT_GET, "rank", FILTER_SANITIZE_NUMBER_INT);
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