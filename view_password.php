<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/view_password.css">
    <title>Password Utility</title>
</head>
<body>
<div id='container'>
<h1>PASSWORD Utility</h1>
<div>
<?php

include_once("connection.php");
session_start();
try {

$sql_query = "select * from utility.password where utility.password.user_id = '$_SESSION[user_id]'";
$records = mysqli_query($con,$sql_query);
$st="";


if($records && mysqli_num_rows($records) > 0){
    //$_SESSION["passwords"] = $records;
  $st .= "<table id='records' style='border:2px solid white;'><tr><th>Title</th><th>Username</th><th>Password</th><th>URL</th></tr>";
  while($data = mysqli_fetch_object($records)){
    $st .= "<tr><td hidden>".$data->pass_id."</td>";
    $st .= "<td>".$data->Title."</td>";
    $st .=  "<td>".$data->username."</td>";
    $st .=  "<td>".$data->password."</td>";
    $st .=  "<td>".$data->url."</td></tr>";
  }
  $st .= "</table>";
}else{
  $st = "<h2>No records in password utility</h2>";
} 


echo $st;

}catch(Exception $e){
echo $e;
}


?>

</div>

<div id="link" style="display:grid;grid-template-columns:1fr 1fr;">
<a href="./insert_password.php">Add new password</a>
<a href="./search_password.php">search password</a>
</div>

</div>
<script src="JS/view_password.js"></script>
</body>
</html>