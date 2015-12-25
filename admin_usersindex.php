<?php
	session_start();
	if($_SESSION['Rights'] >= 1){
?>
<!DOCTYPE html>
<html>
	<?php 
		include 'SQL_Conn/SQL_Connect.php';
		include 'Head.php';
		include 'Inc_Navbar.php';
		include 'Inc_datatable.php';

		$pageName = "user_management"; //pageID

		$usersSQL = "SELECT * FROM `user`";
		$usersRST = Mysql_query( $usersSQL );
	?>
	<body>
		<div class="container">
			<?php include 'header.php'; ?>
			<?php Navbar( $pageName ); ?>
		</div>
		<div class="container-fluid">
			<section style="padding: 20px 0px 0px 0px">
				<table id="myTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style="width: 10%">使用者名稱</th>
							<th style="width: 10%">帳號</th>
							<th style="width: 10%">學號</th>
							<th style="width: 15%">地址</th>
							<th style="width: 15%">E-mail</th>
							<th style="width: 5%">性別</th>
							<th style="width: 5%">年級</th>
							<th style="width: 15%">自我介紹</th>
							<th style="width: 9%">權限</th>
							<th style="width: 3%"></th>
							<th style="width: 3%"></th>
						</tr>
					</thead>
					<?php while($usersROW = mysql_fetch_array( $usersRST )){
							echo '<tr>';
							echo '<td>'.$usersROW['UserName'].'</td>';
							echo '<td>'.$usersROW['UserAcc'].'</td>';
							echo '<td>'.$usersROW['St_id'].'</td>';
							echo '<td>'.$usersROW['Address'].'</td>';
							echo '<td>'.$usersROW['E-mail'].'</td>';
							echo '<td>'.$usersROW['Sex'].'</td>';
							echo '<td>'.$usersROW['Grade'].'</td>';
							echo '<td>'.$usersROW['Introduce'].'</td>';
							echo '<td>';
							echo ($usersROW['Rights'] >= 1)?(($usersROW['Rights'] > 1)?'系統管理員':'管理員'):'一般使用者';
							echo '</td>';
							if($usersROW['Rights'] > 1){
								echo '<td><a class="btn btn-default disabled" href="admin_usersindex.php?rights=up&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限提升"><i class="fa fa-chevron-circle-up"></i></a></td>';
								echo '<td><a class="btn btn-default disabled" href="admin_usersindex.php?rights=down&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限降低"><i class="fa fa-chevron-circle-down"></i></a></td>';
							}else{
								if($usersROW['Rights'] == 1){
									echo '<td><a class="btn btn-default disabled" href="admin_usersindex.php?rights=up&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限提升"><i class="fa fa-chevron-circle-up"></i></a></td>';
									echo '<td><a class="btn btn-default " href="admin_usersindex.php?rights=down&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限降低"><i class="fa fa-chevron-circle-down"></i></a></td>';
								}else{
									echo '<td><a class="btn btn-default" href="admin_usersindex.php?rights=up&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限提升"><i class="fa fa-chevron-circle-up"></i></a></td>';
									echo '<td><a class="btn btn-default disabled" href="admin_usersindex.php?rights=down&acc='.$usersROW['UserAcc'].'" data-toggle="tooltip" title="權限降低"><i class="fa fa-chevron-circle-down"></i></a></td>';
								}
							}
							echo '</tr>';
						} ?>
				</table>
			</section>
		</div>
		<div class="container">
			<?php include 'Footer.php'; ?>
		</div>
	</body>
</html>
<?php 
	if($_SESSION['Rights'] >= 1){
		if(isset($_GET['rights']) && isset($_GET['acc'])){
			if($_GET['rights'] == 'up'){
				$rightsSQL = "UPDATE `user` SET `Rights` = 1 WHERE `UserAcc` = '".$_GET['acc']."'";
			}else{
				$rightsSQL = "UPDATE `user` SET `Rights` = 0 WHERE `UserAcc` = '".$_GET['acc']."'";
				if($_GET['acc'] == $_SESSION['Acc']){
					$_SESSION['Rights'] = 0;
				}
			}
			if(mysql_query($rightsSQL)){
				echo '<meta http-equiv="refresh" content="0; url=admin_usersindex.php" />';
			}
		}
	}
?>
<?php }else{echo '<meta http-equiv="refresh" content="0; url=index.php" />';} ?>