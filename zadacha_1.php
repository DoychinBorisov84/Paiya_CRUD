<html>
<head>
<title> Fill the information</title>
<link rel="stylesheet" type="text/css" href="style_1.css">							<!--include our style_1.css file with the styles we changed  -->
<meta name = "viewport" content = "width=device-width, initial-scale = 1.0" >		<!-- setting to make our view responsible for the devices -->
</head>
<body>
<?php

require 'connect.inc_zadacha_1.php';	

// checks to see if the form fields are filled correctrly and send by $_GET method
if (isset($_GET['useremail']) && isset($_GET['subject']) && isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['message'])) {
	if(!empty($_GET['useremail']) && !empty($_GET['subject']) && !empty($_GET['firstname']) && !empty($_GET['lastname']) && !empty($_GET['message'])){
		
		// variables which takes the information from our form fields
		$useremail = $_GET['useremail'];
		$subject = $_GET['subject'];
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$message = $_GET['message'];

		$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);											// our connection with the database
		$sql = "INSERT INTO users (id, email, subject, firstname, lastname, message) VALUES (NULL, '$useremail', '$subject', '$firstname', '$lastname', '$message') ";

		if ($connect = mysqli_query($link, $sql)) {
			echo 'Submitted successfully';	

			/*
			// mail info . I'm using WAMP and localhost, so I am not sure for the settings in 'php.ini' on a working live host! My guess is below..
			$to = "web@goliveuk.com ";
			$subject;
			$message;
			$headers = 'From : <doichinborisov84@gmail.com>';
				if (mail($to, $subject, $message, $headers)){
					echo 'Mail send successfully';

				}else {
					echo 'Main did NOT send';
				}
			*/
		}else{
			echo 'There was a problem with the datatabase';
		}

		
	}else{

		echo 'Please fiil all the fields necessary';
	}

}else {
	echo "<h1>".'Please fill our information form'."</h1>";
}


?>


<form action = "zadacha_1.php" method = "GET">	
	<div class = "input">
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
		<input type = "submit" value = "Send the request" class = "button">
</form>


</body>
</html>