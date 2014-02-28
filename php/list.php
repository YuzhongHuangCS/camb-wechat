<?php
$listID = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);
$con = mysql_connect("localhost","www-data");
if (!$con){
	die(mysql_error());
}
mysql_query("set character set 'utf8'");
mysql_select_db("camb", $con);
$sql = "SELECT * FROM `list` WHERE parentID = " . $listID;
$result = mysql_query($sql, $con);
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
mysql_close($con);
?>