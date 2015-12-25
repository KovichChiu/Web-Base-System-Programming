<?php
	session_start();
	if(isset( $_SESSION['Acc'] )){ ?>
<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';

		$pageName = "Passwd_Mod"; //pageID

	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
			<div class="jumbotron" style="background-color: #5bc0de; color: white">
				<h2>
					修改密碼 <small>Modify Password</small>
				</h2>
				<form action="user_pswdMod.php" method="POST">
					<div class="form-group has-error">
						<label class="control-label">Old Password</label>
						<input type="password" class="form-control" name="old">
						<span id="helpBlock2" class="help-block">請輸入舊密碼</span>
					</div>
					<div class="form-group has-success">
						<label class="control-label">New Password</label>
						<input type="password" class="form-control" name="new">
						<span id="helpBlock2" class="help-block">請輸入新密碼</span>
					</div>
					<div class="form-group has-success">
						<label class="control-label">Comfirm Password</label>
						<input type="password" class="form-control" name="comnew">
						<span id="helpBlock2" class="help-block">請確認新密碼</span>
					</div>
					<a class="btn btn-danger btn-lg" href="index.php"><i class="fa fa-pencil"></i> <b>Cancel</b></a>
					<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-trash"></i> <b>Save</b></button>
				</form>
			</div>
		</section>
	</body>
	<?php include 'Footer.php'; ?>
</html>
<?php 
	if(isset( $_POST['old'] )){
		$old = preg_replace("/[\'\"]+/" , '' ,$_POST['old']);
		$new = preg_replace("/[\'\"]+/" , '' ,$_POST['new']);
		$comnew = preg_replace("/[\'\"]+/" , '' ,$_POST['comnew']);
		$userSQL = "SELECT * FROM `user` WHERE `UserAcc` = '".$_SESSION['Acc']."'";
		if( $userROW = mysql_fetch_array( Mysql_query( $userSQL ) ) ){
			if($userROW['UserPw'] == MD5($old)){
				if($new == $comnew){
					$udSQL = "UPDATE `user` SET `userPw` ='".MD5($new)."' WHERE `UserAcc` = '".$_SESSION['Acc']."'";
					if(Mysql_query($udSQL)){
						echo '<script>alert("Success!!")</script>';
						echo '<meta http-equiv="refresh" content="0; url=index.php" />';
					}
				}else{
					echo '<script>alert("確認密碼錯誤! Please Try Again!!")</script>';
					echo '<meta http-equiv="refresh" content="0; url=user_pswdMod.php" />';
				}
			}else{
				echo '<script>alert("舊密碼輸入錯誤! Please Try Again!!")</script>';
				echo '<meta http-equiv="refresh" content="0; url=user_pswdMod.php" />';
			}
		}
	}
}else{
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
}
?>