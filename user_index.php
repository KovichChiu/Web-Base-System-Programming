<?php
	session_start();
	if(isset( $_SESSION['Acc'] )){ ?>
<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';

		$pageName = "user_index"; //pageID
		$userSQL = "SELECT * FROM `user` WHERE `UserAcc` = '".$_SESSION['Acc']."'";
		$userRSL = Mysql_query( $userSQL );
		$userROW = Mysql_fetch_array( $userRSL );
	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
			<div class="jumbotron" style="background-color: #5bc0de; color: white">
				<h2>使用者資訊 <small>Information</small></h2>
				<p style="text-align: center">Name : <?php echo $userROW['UserName'] ?></p>
				<p style="text-align: center">Account :<?php echo $userROW['UserAcc'] ?></p>
				<p style="text-align: center">Password : ‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧‧</p>
				<p style="text-align: center">Address : <?php echo $userROW['Address'] ?></p>
				<p style="text-align: center">E-mail : <?php echo $userROW['E-mail'] ?></p>
				<p style="text-align: center">Sex : <?php echo $userROW['Sex'] ?></p>
				<p style="text-align: center">Grade : <?php echo $userROW['Grade'] ?></p>
				<p style="text-align: center">Introduce : <?php echo $userROW['Introduce'] ?></p>
				<p style="text-align: center">Rights : 
					<?php if($userROW['Rights'] == 1){
							echo '系統管理員';
						}else{
							echo '一般使用者';
						} ?>
				</p>	
				<a class="btn btn-warning btn-lg" href="user_infoMod.php"><i class="fa fa-pencil"></i> <b>修改帳號資訊</b></a>
				<a class="btn btn-danger btn-lg" href="#" role="button"><i class="fa fa-trash"></i> <b>刪除帳號</b></a>
		</section>
	</body>
	<?php include 'Footer.php'; ?>
</html>
<?php }else{
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
} ?>