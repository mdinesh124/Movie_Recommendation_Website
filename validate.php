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
		$database = "user_accounts";

		$connect=mysqli_connect($server, $user, $password, $database);

		if (!$connect) {
			die("ERROR: Cannot connect to database $database on server $server using username $user(".mysqli_connect_errno().", ".mysqli_connect_error().")");
		}
		$firstname   =$_POST['uname'];
		$pswd        =$_POST['uid'];
        $sql="select * from users where firstname='$firstname' and password='$pswd'";
        $result= mysqli_query($connect,$sql);
        $count=mysqli_num_rows($result);
       if($count==1){
           header("location:index.html");
       }else{
        header("location:front page.html") ;
        echo '<script>alert("enter valid details")</script>';
       
       }
		
	?>
</body>
</html>