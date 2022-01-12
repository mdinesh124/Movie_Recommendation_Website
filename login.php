<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
    <?php
 $server = "localhost";
 $user = "root";
 $password = "";
 $database = "user_accounts";

 $connect=mysqli_connect($server, $user, $password, $database);

 mysqli_select_db($connect,'user_accounts');
 if(isset(['login'])){

 
 $username= $_POST['username'];
 $password= $_POST['password'];

 $userQuery= "select * from users where firstname='.$username.' and password='.$password.' limit 1";
  
 $result= mysqli_query($connect, $userQuery);

 $num = mysqli_num_rows($result);

 if($num ==1){
     header('location:index.html');
 } else{
     echo "enter valid details";
     header('loaction:login.html');
 }
}
 mysqli_close($connect);

 ?>

</head>
<body>
    <form class="box" action="#" method="POST" >
            <h1>login</h1>
            <input type="text" placeholder="username" class="usid" id="username" name="username" required>
            <input type="password" placeholder="password" class="usid"  id="password"  name="password" required>
          <input type="submit" value="login" class="button" >
    </form>
</body>
</html>