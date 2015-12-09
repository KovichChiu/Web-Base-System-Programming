<?php 
	$db_server = "localhost";
	$db_name = "Kovich_DB";
	$db_user = "kovich";
	$db_pw = "jdes930108";
	if(!@mysql_connect($db_server,$db_user,$db_pw)) die("connect failed");
	mysql_query("SET NAMES utf8");
	if(!@mysql_select_db($db_name)) die("can't use DB");
?>