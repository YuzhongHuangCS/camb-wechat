<?php
require('init.php');
$listID = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);
$sql = 'SELECT * FROM `list` WHERE `listID` = ' . $listID . ' ORDER BY `list`.`rank`';
$result = mysql_query($sql, $con);
mysql_close($con);
$row = array();
while($r = mysql_fetch_assoc($result)){
	foreach ($r as $key => $value) {
		$r[$key] = urlencode($value);
	}
	$row[] = $r;
}
$json = urldecode(json_encode($row));
header('Content-Type: application/json; charset=utf-8');
echo($json);
?>