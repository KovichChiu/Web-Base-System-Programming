<?php
	session_start();
	include 'SQL_Conn/SQL_Connect.php';
	if(isset( $_SESSION['Acc'] )){
		$userdelSQL="DELETE FROM `user` WHERE `UserAcc` ='".$_SESSION['Acc']."'";
		if(Mysql_query( $userdelSQL )){
			session_destroy();
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
	}else{
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
} ?>