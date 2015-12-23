<!DOCTYPE html>
<html>
	<?php 
		include '../Head.php';
		include '../SQL_Conn/SQL_Connect.php';
		session_start();
		$SQL_opi = "SELECT * FROM `Memo`";
		$Rst_opi = Mysql_query( $SQL_opi );
	?>
	<body class="container">
		<header style="padding: 20px 0px 0px 0px">
			<h1 class="text-center"> 網頁系統開發2015 <br><small> by Kovich <small> ver 0.1.2 </small> </small> </h1>
			<?php include 'Inc_Navbar.php'; ?>
		</header>
		<section style="padding: 20px 0px 0px 0px">
			<?php 
				while($Row_opi = Mysql_fetch_array( $Rst_opi )){
					echo '<div class="jumbotron" style="background-color: #5bc0de; color: white">';
					echo '<h2 class="card-title">';
					echo $Row_opi['Title'];
					echo '</h2>';
					echo '<p>';
					echo $Row_opi['Memo'];
					echo '</p>';
					echo '<p class="card-text" style="text-align: right">由 '.$Row_opi['Name'].' 在 '.date("Y-m-d H:i:s",$Row_opi['Time']).' 提出</p>';
					echo '</div>';
				}
				if($Row_opi == null){
					echo '<h3><p style="text-align: center; color: gray"><i>以下無資料可以顯示。</i></p></h3>';
				}
			?>
		</section>
		<?php include '../Footer.php'; ?>
	</body>
</html>