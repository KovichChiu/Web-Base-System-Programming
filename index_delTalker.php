<?php
	session_start();
	include 'SQL_Conn/SQL_Connect.php';
	if(isset( $_SESSION['Acc'] )){
		if($_GET['name'] == $_SESSION['uName']){
			$delSQL = "DELETE FROM `Memo` WHERE `Number`=".$_GET['num'];
			if(mysql_query( $delSQL )){
				echo '<script>alert("刪除成功!")</script>';
				echo '<meta http-equiv="refresh" content="0; url=index.php" />';
			}
		}else{
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
	}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php" />';
	}
?>