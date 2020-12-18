<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Login Page</title>
</head>
<body>
<div id="container">
<form id="login" action="" method="post">
<h1>LOGIN</h1>
<div>
<span>Username :</span><input name="name" id="name" type="text" required>
</div>
<div>
<span>Password :</span><input name="password" id="password" type="password" required>
</div>
<div>
<input type="submit" value="LOGIN">
<span>OR</span> 
<a href="./index.php">sign-up</a>
</div>

</form>
</div>


<?php 
include_once("connection.php"); 


if( isset($_POST["name"]) && isset($_POST["password"])){
    $sql_query = "select id,username,password from utility.user where username like '$_POST[name]' and password like '$_POST[password]'";
    $records = mysqli_query($con,$sql_query);
    if(mysqli_num_rows($records) == 1){
        echo "Login Successfull!";
        session_start();
        $data = mysqli_fetch_object($records);
        $_SESSION['user_id'] = $data->id;
        header("Location:./view_password.php");
    }else{
        echo "Login Failed!";
    }

}


?>

</body>
</html>