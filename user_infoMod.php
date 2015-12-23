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
				<h2>使用者資訊修改 <small>Modify User Information</small></h2>
				<form action="user_infoMod.php" method="POST">
					<div class="form-group has-error">
						<label class="control-label" for="inputError1">Name</label>
						<input type="text" class="form-control" id="inputSuccess1" <?php echo 'value="'.$userROW['UserName'].'"' ; ?> readonly = readonly>
						<span id="helpBlock2" class="help-block">若要更換姓名，請洽系統管理員。</span>
					</div>
					<div class="form-group has-success">
						<label class="control-label" for="inputSuccess1">Address</label>
						<input type="text" class="form-control" id="inputSuccess1" <?php echo 'value="'.$userROW['Address'].'"' ; ?> name="address">
					</div>
					<div class="form-group has-success">
						<label class="control-label" for="inputSuccess1">E-mail</label>
						<input type="text" class="form-control" id="inputSuccess1" <?php echo 'value="'.$userROW['E-mail'].'"' ; ?> name="email">
					</div>
					<div class="form-group has-success">
						<label class="control-label" for="inputSuccess1">Sex</label>
						<input type="text" class="form-control" id="inputSuccess1" <?php echo 'value="'.$userROW['Sex'].'"' ; ?> name="sex">
					</div>
					<div class="form-group has-success">
						<label class="control-label" for="inputSuccess1">Grade</label>
						<input type="text" class="form-control" id="inputSuccess1" <?php echo 'value="'.$userROW['Grade'].'"' ; ?> name="grade">
					</div>
					<div class="form-group has-success">
						<label class="control-label" for="inputSuccess1">Introduce</label>
						<textarea type="text" class="form-control" id="inputSuccess1" name="introduce"><?php echo $userROW['Introduce'] ; ?></textarea>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-8"></div>
						<div class="col-xs-3 col-md-2"> <a class="btn btn-danger btn-lg" href="user_index.php"><i class="fa fa-pencil"></i> <b>Cancel</b></a> </div>
						<div class="col-xs-3 col-md-2"> <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-trash"></i> <b>Save</b></button> </div>
					</div>
				</form>
			</div>
		</section>
	</body>
	<?php include 'Footer.php'; ?>
</html>
<?php 
	if(isset( $_POST['address'] ) || isset( $_POST['email'] ) || isset( $_POST['sex'] ) || isset( $_POST['grade'] )|| isset( $_POST['introduce'])){
		$address = preg_replace("/[\'\"]+/" , '' ,$_POST['address']);
		$email = preg_replace("/[\'\"]+/" , '' ,$_POST['email']);
		$sex = preg_replace("/[\'\"]+/" , '' ,$_POST['sex']);
		$grade = preg_replace("/[\'\"]+/" , '' ,$_POST['grade']);
		$introduce = preg_replace("/[\'\"]+/" , '' ,$_POST['introduce']);
		if( !empty( $address ) && !empty( $email ) && !empty( $sex ) && !empty( $grade ) ){
			$userinfoSQL = "UPDATE `user` SET `Address` ='".$address."', `E-mail` ='".$email."', `Sex` ='".$sex."', `Grade` ='".$grade."', `Introduce`='".$introduce."' WHERE `UserAcc` = '".$_SESSION['Acc']."'";
			if(Mysql_query( $userinfoSQL )){
				echo '<script>alert("修改完成！")</script>';
				echo '<meta http-equiv="refresh" content="0; url=user_index.php" />';
			}else{
				echo '<script>alert("Sorry, We have Some Problem~ Please Try Again!!")</script>';
				echo '<meta http-equiv="refresh" content="0; url=user_index.php" />';
			}
		}else{
			echo '<script>alert("DO NOT leave SPACE!!")</script>';
		}
	}
 }else{
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
} ?>