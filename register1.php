<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css1.css">
    <style>
    	.tab{
    		padding: 2px;
    	}
    </style>
</head>
<body>
	<?php  
	   
		$server = "localhost";
		$user = "root";
		$password = "";
		$database = "register";

		$connect=mysqli_connect($server, $user, $password, $database);

		if (!$connect) {
			die("ERROR: Cannot connect to database $database on server $server using username $user(".mysqli_connect_errno().", ".mysqli_connect_error().")");
		}
		$username   =$_POST['username'];
		$phonenumber=$_POST['phonenumber'];
		$email       =$_POST['email'];
		$password    =$_POST['password'];
	   


		$userQuery = "insert into registration(username, phonenumber, email,password) values('$username',  '$phonenumber', '$email', '$password')";

		$result = mysqli_query($connect, $userQuery);

		if (!$result) {
			die("Could no successfully run Query ($userQuery) from $database: " .mysqli_error($connect));
		}
		else{
			header('location:front page.html');
		}
		mysqli_close($connect);
	?>
</body>
</html>