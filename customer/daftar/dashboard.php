<?php 
	session_start();
		if($_SESSION['userweb'=='']){
			header('location:../../index.php');
		}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
</head>
<body>
	<h4><b>Selamat Datang <?php echo $_SESSION['nama']; ?></b></h4>
	<h2><b>Persewaan Kamar KOS</b></h2>
	<?php include '../karosel.php'; ?>
</body>
</html>