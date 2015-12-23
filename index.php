<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';

		$pageName = "home"; //pageID

		$indexSQL = "SELECT `Number`, `Title`, `UD01`, `UD02`, `UD03`, `UD04`, `UD05`, `Time`
					 FROM `newUD`
					 ORDER BY `Number` DESC";
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
					echo '</div>';
				}
			?>
		</section>
	</body>
	<?php include 'Footer.php'; ?>
</html>