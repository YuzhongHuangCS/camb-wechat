<?php
if(defined('SAE_APPNAME')){
	$con = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
}
else{
	$con = mysql_connect('localhost','www-data');
}
if (!$con){
	die(mysql_error());
}
mysql_query("set character set 'utf8'");
if(defined('SAE_APPNAME')){
	mysql_select_db(SAE_MYSQL_DB, $con);
}
else{
	mysql_select_db("camb", $con);
}
?>