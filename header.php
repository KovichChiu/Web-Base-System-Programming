<?php 
	include 'SQL_Conn/SQL_Connect.php';
	$verSQL="SELECT `LastedVerNo` FROM `NowVirsion`";
	$verRST = Mysql_query( $verSQL );
	$verROW = mysql_fetch_array($verRST);
?>
<header style="padding: 20px 0px 0px 0px" >
	<img src="Img/Logo.png" alt="Kovich" style="width:150px; display:block; margin:auto; max-width: 150px" >
	<h1 style="text-align: center; color: #4A0707"> 網頁系統開發 <br><small> by Kovich <small> ver <?php echo $verROW['LastedVerNo']; ?> </small> </small> </h1>
</header>