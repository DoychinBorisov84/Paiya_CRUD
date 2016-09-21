<a href = "zadacha_1.2.php" class = "home"> Go Back </a> <br>

<?php
include 'connect.inc_zadacha_1.php';

$id = $_GET['id'];
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);
$sql = "DELETE  FROM users WHERE id = '$id' ";

	if ($connect = mysqli_query($link, $sql))
	{
		echo 'Deleted successfully';
	}
	else {
		echo 'NOT deleted';
	}
?>



