<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
<<<<<<< HEAD
		include 'SQL_Conn/SQL_Connect.php';
=======
>>>>>>> origin/master
		include 'Inc_Navbar.php';

		$pageName = "home"; //pageID

<<<<<<< HEAD
		$SQL_opi = "SELECT * FROM `Memo` ORDER BY `Memo`.`Time` DESC";
		$Rst_opi = Mysql_query( $SQL_opi );
=======
		$indexSQL = "SELECT `Number`, `Title`, `UD01`, `UD02`, `UD03`, `UD04`, `UD05`, `Time`
					 FROM `newUD`
					 ORDER BY `Number` DESC";
		$indexRST = Mysql_query( $indexSQL );
>>>>>>> origin/master
	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
<<<<<<< HEAD
			
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
=======
			<?php 
				while( $indexROW = Mysql_fetch_array( $indexRST ) ){
					echo '<div class="jumbotron" style="background-color: #5bc0de; color: white">';
					echo '<h2>';
					echo $indexROW['Title'];
					echo '</h2>';
					echo '<ol>';
					echo '<li>'.$indexROW['UD01'].'</li>';

					if(!empty( $indexROW['UD02'] ))
						echo '<li>'.$indexROW['UD02'].'</li>';

					if(!empty( $indexROW['UD03'] ))
						echo '<li>'.$indexROW['UD03'].'</li>';

					if(!empty( $indexROW['UD04'] ))
						echo '<li>'.$indexROW['UD04'].'</li>';

					if(!empty( $indexROW['UD05'] ))
						echo '<li>'.$indexROW['UD05'].'</li>';

					echo '</ol>';
					echo '<p style="text-align: right">';
					echo $indexROW['Time'];
					echo ' 發布</p>';
>>>>>>> origin/master
					echo '</div>';
				}
			?>
		</section>
	</body>
<<<<<<< HEAD
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
=======
	<?php include 'Footer.php'; ?>
</html>
>>>>>>> origin/master
