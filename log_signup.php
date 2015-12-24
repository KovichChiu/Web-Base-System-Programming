<!DOCTYPE html>
<?php 
	include 'SQL_Conn/SQL_Connect.php';
?>
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta name="viewport" content="width=360">
		<link rel="stylesheet" href="log_inc/css/style.css">
		<title>Sign Up</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="container" style="height: 600px">
				<h1>Sign Up</h1>

				<form class="form" action="log_signup.php" method="POST">
					<input type="text" placeholder="Username" name="Username">
					<input type="text" placeholder="Account" name="Account">
					<input type="password" placeholder="Password" name="Password">
					<button type="submit">Submit</button>
				</form>
			</div>

			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<script src="log_inc/js/index.js"></script>
	</body>
</html>
<?php 
	if(isset( $_POST['Account'] )){
		$name = preg_replace("/[\'\"]+/" , '' ,$_POST['Username']);
		$Acc = preg_replace("/[\'\"]+/" , '' ,$_POST['Account']);
		$Pw = MD5(preg_replace("/[\'\"]+/" , '' ,$_POST['Password']));
		if (isset( $name ) && isset( $Acc ) && isset( $Pw )) {
			$IstSQL = "INSERT INTO `user` (`UserName`, `UserAcc`, `UserPw`) VALUE ('".$name."', '".$Acc."', '".$Pw."')";
			echo (Mysql_query( $IstSQL ))?' <script>alert("Success!")</script> ':' <script>alert("Fail!")</script> ';
			echo '<meta http-equiv="refresh" content="0; url=log_login.php" />';
		}else{
			echo '<script>alert("DO NOT Attack Me!!")</script>';
			echo '<meta http-equiv="refresh" content="0; url=log_login.php" />';
		}
	}
?>