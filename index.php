<!DOCTYPE html>
<html>
	<?php 
		include 'Head.php';
		include 'SQL_Conn/SQL_Connect.php';
		include 'Inc_Navbar.php';

		$pageName = "home"; //pageID

		$SQL_opi = "SELECT * FROM `Memo` ORDER BY `Time` DESC";
		$Rst_opi = Mysql_query( $SQL_opi );
	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
			
			<form action="index.php" method="POST">
				<div class="jumbotron" style="background-color: #5bc0de; color: white">
					<div class="container">
						<h2>留言~</h2>
						<div class="form-group has-success">
							<textarea type="text" class="form-control" id="inputSuccess1" name="talker" placeholder="你想說甚麼?"></textarea>
						</div>
						<button type="submit" class="btn btn-success btn-lg" <?php if(! isset( $_SESSION['Acc'] )){echo 'disabled';} ?>><i class="fa fa-trash"></i> <b>Send</b></button>

					</div>
				</div>
			</form>
			
			<?php 
				while($Row_opi = Mysql_fetch_array( $Rst_opi )){
					echo '<div class="jumbotron" style="background-color: #5bc0de; color: white">';
					echo '<div class="container">';
					echo '<h2 class="card-title">';
					echo $Row_opi['Name'].'<br><small>'.date("Y-m-d H:i:s",$Row_opi['Time']).'</small>';
					echo '</h2>';
					echo '<p>'.$Row_opi['Memo'].'</p>';
					echo ($_SESSION['uName'] == $Row_opi['Name'])?'<a class="btn btn-danger" title="Delete" href="index_delTalker.php?num='.$Row_opi['Number'].'&name='.$Row_opi['Name'].'" onclick="return confirm(\'確定刪除?\');"> <i class="fa fa-times"></i> </a>':'';
					echo '</div>';
					echo '</div>';
				}
			?>
		</section>
		<?php include 'Footer.php'; ?>
	</body>
</html>
<?php
	$time = time();
	$talker = preg_replace("/[\'\"]+/" , '' ,$_POST['talker']);

	if(!empty($talker)){
		$sql_opi_input = "INSERT INTO `Memo` (`Time`, `Name`, `Memo`) VALUES ('".$time."', '".$_SESSION['uName']."', '".nl2br($talker)."')";
		if(@mysql_query( $sql_opi_input )){
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
	}
?>