<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/insert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Edit Password</title>
    <script>
    
    
    function change1(){
      
        
        $("#strength").val();
        if($("#password").val().length == 0){
            $("#strength").val("0");
        }
        else if( $("#password").val().length >= 1 &&  $("#password").val().length <= 4 ){
            $("#strength").val("25");
        }else if($("#password").val().length >= 5 &&  $("#password").val().length <= 8){
            $("#strength").val("50");
        }
        else if($("#password").val().length >= 12 &&  $("#password").val().length <= 15){
            $("#strength").val("75");
        }
        else if($("#password").val().length >= 15 ){
            $("#strength").val("100");
        }
    
    
    }
    
    function submit_enable(e){
        
        if($("#password").val() != $("#repeat").val()){
            e.preventDefault();
        }
    }
    
    
    </script>
</head>
<body>
<div id="container">
    <h1>Edit Password</h1>
    <form id="insert" action="" method="POST" onsubmit="submit_enable(event);">
    <table>
    <tr hidden><td><input name="id" id="id" value="" type="number"></td></tr>
    <tr><td>Title : </td><td><input name="title" id="title" value="" type="text" required></td></tr>
    <tr><td>User name : </td><td><input name="name" id="name" value="" type="text" required></td></tr>
    <tr><td>Password : </td><td><input name="password" id="password" value="" type="password" oninput="change1()" required></td></tr>
    <tr><td>Confirm Password : </td><td><input name="repeat" id="repeat" value="" type="password" required></td></tr>
    <tr>
    <td><button id="visibility_check" >Show Password</button></td>
    <td><button id="button" >Create New Password</button></td>
    </tr>
    <tr><td>Password Strength : </td><td><progress id="strength" value="32" min="0" max="100"> 32% </progress></td></tr>
    <tr><td>URL : </td><td><input name="url" id="url" value="" type="url" required></td></tr>
    <tr><td colspan="2"><input name="save" id="save" value="Edit Password" type="submit"></td></tr>
    </table>
    </form>
</div>
<script src="JS/insert.js"></script>
<script src="JS/edit.js"></script>
<?php
include_once("connection.php");
session_start();




if( isset($_POST["name"]) && isset($_POST["title"]) && isset($_POST["password"]) && isset($_POST["url"])){

$sql_query = "UPDATE utility.password SET Title = '$_POST[title]',username='$_POST[name]',
password='$_POST[password]',url='$_POST[url]'
where utility.password.pass_id = ".$_POST["id"];

echo $_POST["id"];
mysqli_query($con,$sql_query) or
die("password update failed!");

header("Location:./view_password.php");
}



?>



</body>
</html>