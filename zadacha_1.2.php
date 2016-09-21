<html>
<head>
	<title>Delete Records in our Database </title>									<!--Our title, responsive viewport and stylesheet included in the head -->
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php

require 'connect.inc_zadacha_1.php';														// our db file with our vars set to host, user, pass, name DB


$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);				// link with the DB
$sql = " SELECT id, firstname, lastname, email, subject, message FROM users ORDER BY id ";

if ($connect = mysqli_query($link, $sql)) {													// if we have a success in connecting with DB

	while ($sql_row = mysqli_fetch_assoc($connect)){									//we take our conection as an array and put it in the $sql_row	

		$id = $sql_row['id'];
		$email = $sql_row['email'];
		$subject = $sql_row['subject'];													// assigning the data from the array in a variables to use	
		$firstname = $sql_row['firstname'];
		$lastname = $sql_row['lastname'];
		$message = $sql_row['message'];

		echo "<div id = 'tablic'>
				<table id = 'myTable'>			
				<tr>
					<th>ID </th>
					<th>Firstname </th>
					<th>Lastname  </th>
					<th>Email </th>
					<th>Subject </th>
					<th>Message </th>															
				</tr>					
				<tr>
					<td>" .$id	."</td>
					<td>". $firstname. "</td> 
					<td>". $lastname.  "</td>
					<td>". $email. 	   "</td>
					<td>". $subject.   " </td>
					<td>". $message.   " </td>
				<nav class = 'clickers'>
					<a href = 'edit.php?id=".$sql_row['id']."'>Edit Record</a>									
	 				<a href = 'delete.php?id=".$sql_row['id']."'> Delete Record</a>
	 			</nav>	
	 			</tr>
				
			 </table>
			 </div>";		 	
	}

}else {
	echo 'ERROR'.mysqli_error($link);
}

?>


</body>
</html>





