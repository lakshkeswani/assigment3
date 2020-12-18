<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>SIGN Page</title>
</head>
<body>
<div id="container">
<form  action="" method="post">
<h1>SIGN-UP</h1>
<div>
<label for="new_name">Username :</label><input name="new_name" id="new_name" type="text" required>
</div>
<div>
<label for="new_ps">Password :</label><input name="new_ps" id="new_ps" type="password" required>
</div>

<div>
<input type="submit" value="SIGNUP" id="signup">
<span>OR</span>
<a href="./login.php">login</a>
</div>
</form>

<div id="result"></div>
</div>

<script src="index.js"></script>

<?php 
include_once("connection.php");

if( isset($_POST["new_name"]) && isset($_POST["new_ps"])){
$sql_query = "select username,password from utility.user where username like '$_POST[new_name]' and password like '$_POST[new_ps]'";
$records = mysqli_query($con,$sql_query);
if(mysqli_num_rows($records) > 0){
    echo "Username Already Taken!";
}else{
    $sql_query = "insert into utility.user (username,password) values('$_POST[new_name]','$_POST[new_ps]')";
    mysqli_query($con,$sql_query)
    or die("sign up failed!");
    header("Location:./login.php");
}




}




?>

</body>
</html>