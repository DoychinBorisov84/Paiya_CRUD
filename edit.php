<html>
<head>
<title> Edit Record </title>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>


<a href = "zadacha_1.2.php" class = "home"> Go Back </a> <br>

<?php 

require 'connect.inc_zadacha_1.php';

if (isset($_GET['id'])){
$id = $_GET['id'];

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);
$sql_data = "SELECT id, firstname, lastname, email, subject, message FROM users WHERE id = '$id' ";		

$connect = mysqli_query($link, $sql_data);
$sql_row = mysqli_fetch_assoc($connect); 
	
	$id = $sql_row['id'];
	$email = $sql_row['email'];
	$firstname = $sql_row['firstname'];
	$lastname = $sql_row['lastname'];
	$subject = $sql_row['subject'];
	$message = $sql_row['message'];

	if (isset($_POST['submit']))	{

		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$sql_edit = "UPDATE users SET email = '$email', firstname = '$firstname', lastname = '$lastname', subject = '$subject', message = '$message' WHERE id = '$id' ";

		if ($editing = mysqli_query($link, $sql_edit)) {
			echo 'Changes accepted';
		}else{
			echo 'Failed to make changes';
		}

	}



?>


<form action = "" method = "POST" >

	<d<div class = "input">
		Email:
		<input type = "email" name = "useremail" required>
		Subject:
		<input type = "text" name = "subject">
		Firstname:
		<input type = "text" name = "firstname">
		Lastname:
		<input type = "text" name = "lastname"><br><br>
	</div>
	<div class = "textbox">
		<textarea placeholder = "Your message here" rows = "7" cols = "60" name = "message" class = "textme" ></textarea> <br><br>
	</div>
			<input type = "submit" name = "submit" value = "Save changes" class = "button">

</form>
<?php 
}
?>
</html>