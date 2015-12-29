<!DOCTYPE html>
<?php 
	include 'SQL_Conn/SQL_Connect.php';
	session_start();
?>
<html >
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<meta name="viewport" content="width=360">
		<link rel="stylesheet" href="log_inc/css/style.css">
		
		<title>Login</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<h1>Login</h1>

				<form class="form" action="" method="POST">
					<input type="text" placeholder="Account" name="Account">
					<input type="password" placeholder="Password" name="Password">
					<button type="submit" id="login-button">Login</button>
				</form>
				<form action="log_signup.php">
					<button>Sign Up</button>
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
		$Acc = preg_replace("/[\'\"]+/" , '' ,$_POST['Account']);
		$Pw = MD5(preg_replace("/[\'\"]+/" , '' ,$_POST['Password']));
		if( isset( $Acc ) && isset( $Pw ) ){
			$userSQL = "SELECT * FROM `user` WHERE `UserAcc` ='".$Acc."'";
			if( $userROW = Mysql_fetch_array( Mysql_query( $userSQL ) ) ){
				if($userROW['UserPw'] == $Pw){
					$_SESSION['uName'] = $userROW['UserName'];
					$_SESSION['Acc'] = $Acc;
					$_SESSION['Rights'] = $userROW['Rights'];
					// echo '<script>alert("Welcome! '.$userROW['UserName'].'")</script>';
					echo '<meta http-equiv="refresh" content="1; url=index.php" />';
<<<<<<< HEAD
				}else{
					echo '<script>alert("Aren\'t You '.$userROW['UserName'].'?")</script>';
					echo '<meta http-equiv="refresh" content="0; url=log_login.php" />';
				}
			}
			if($userROW == 0){
				echo '<script>alert("CAN NOT Find The Account!! Please Try Again!!")</script>';
=======
				}
			}else{
				echo '<script>alert("DO NOT Find The Account!! Please Try Again!!")</script>';
>>>>>>> origin/master
				echo '<meta http-equiv="refresh" content="0; url=log_login.php" />';
			}
		}else{
			echo '<script>alert("DO NOT Attack Me!!")</script>';
			echo '<meta http-equiv="refresh" content="0; url=log_login.php" />';
		}
	}
?>