<?php
	session_start();
	if( $_SESSION['Rights'] == 2 ){ ?>
<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';

		$pageName = "System_Log"; //pageID

	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
			<div class="jumbotron" style="background-color: #5bc0de; color: white">
				<h2>
					新增日誌 <small>New Log</small>
				</h2>
				<form action="System.Log.php" method="POST">
					<div class="form-group has-warning">
						<label class="control-label">標題</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group has-success">
						<label class="control-label">日誌內容</label>
						<textarea rows="10"class="form-control" name="content"></textarea>
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
	if( $_SESSION['Rights'] == 2 ){
		if(isset($_POST['title']) && isset($_POST['content'])){
			$time = time();
			$title = preg_replace("/[\'\"]+/" , '' ,$_POST['title']);
			$content = nl2br(preg_replace("/[\'\"]+/" , '' ,$_POST['content']));
			$logSQL = "INSERT INTO `newUD` (`Title`, `Content`, `Time`) VALUES ('".$title."', '".$content."', ".$time.")";
			$verSQL = "UPDATE `NowVirsion` SET `LastedVerNo` = '".$title."', `LastedVerTime` = ".$time;

			if(Mysql_query($logSQL) && Mysql_query($verSQL)){
				echo '<script>alert("成功")</script>';
				echo '<meta http-equiv="refresh" content="0; url=System.Log.php" />';
			}
		}
	}
?>
<?php }else{
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
} ?>