<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';

		$pageName = "update"; //pageID

		$indexSQL = "SELECT * FROM `newUD` ORDER BY `Number` DESC";
		$indexRST = Mysql_query( $indexSQL );
	?>
	<body class="container">
		<?php include 'header.php'; ?>
		<?php Navbar( $pageName ); ?>
		<section style="padding: 20px 0px 0px 0px">
			<?php 
				while( $indexROW = Mysql_fetch_array( $indexRST ) ){
					echo '<div class="jumbotron" style="background-color: #5bc0de; color: white">';
					echo '<h2>';
					echo $indexROW['Title'];
					echo '</h2>';
					echo '<p>'.$indexROW['Content'].'</p>';
					echo '<p style="text-align: right">';
					echo date("Y-m-d",$indexROW['Time']);
					echo ' 發布</p>';
					echo '</div>';
				}
			?>
		</section>
	</body>
	<?php include 'Footer.php'; ?>
</html>