<?php 
	include '../SQL_Conn/SQL_Connect.php';
	// date_default_timezone_set('Asia/Taipei');
	// $today = getdate(); //monday week begin reconvert
	
	// $sec = ($today['seconds'] < 10)?"0":"").$today['seconds'];
	// $min = ($today['minutes'] < 10)?"0":"").$today['minutes'];
	// $hr = ($today['hours'] < 10)?"0":"").$today['hours'];
	// $day = ($today['mday'] < 10)?"0":"").$today['mday'];
	// $mon = ($today['mon'] < 10)?"0":"").$today['mon'];
	// $year = $today['year'];
	$time = time();
	$title = preg_replace("/[\'\"]+/" , '' ,$_POST['title']);
	$name = preg_replace("/[\'\"]+/" , '' ,$_POST['name']);
	$memo = preg_replace("/[\'\"]+/" , '' ,$_POST['memo']);

	if(!empty($title) && !empty($name) && !empty($memo)){
		$sql_opi_input = "INSERT INTO `Memo` (`Time`, `Title`, `Name`, `Memo`) VALUES ('".$time."', '".$title."', '".$name."', '".$memo."')";
		if(@mysql_query( $sql_opi_input )){
			echo '<script>alert("意見提出成功")</script>';
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
	}else{
		echo '<script>alert("請勿空白或是攻擊本站台");window.location="index.php"</script>';
	}
?>