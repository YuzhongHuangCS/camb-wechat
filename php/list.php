<?php
$listID = filter_input(INPUT_GET, "listID", FILTER_SANITIZE_NUMBER_INT);
$con = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con){
	die(mysql_error());
}
mysql_query("set character set 'utf8'");
mysql_select_db(SAE_MYSQL_DB, $con);
$sql = "SELECT * FROM `list` WHERE parentID = " . $listID . " ORDER BY `list`.`rank`";
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