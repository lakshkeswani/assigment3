<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/insert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="JS/insert.js"></script>
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
    <title>Add Password</title>
</head>
<body>
<div id="container">
    <h1>Add New Password</h1>
    <form id="insert" action="" method="POST" onsubmit="submit_enable(event);">
    <table>
    <div>
    <tr><td>Title : </td><td><input name="title" id="title" type="text" required></td></tr>
    </div>
    <tr><td>User name : </td><td><input name="name" id="name" type="text" required></td></tr>
    <tr><td>Password : </td><td><input name="password" oninput='change1()' id="password" type="password" required></td>
    </tr>
    <tr><td>Confirm Password : </td><td><input name="repeat" id="repeat" type="password" required></td></tr>
    <tr>
        <td><button id="visibility_check" >Show Password</button></td>
        <td><button id="button" >Create New Password</button></td>
    </tr>
    <tr><td>Password Strength : </td><td><progress id="strength" value="0" min="0" max="100"> 0% </progress></td></tr>
    <tr><td>URL : </td><td><input name="url" id="url" type="url" required></td></tr>
    <tr><td colspan="2"><input name="save" id="save" value="Save Password" type="submit" ></td></tr>
    </table>
    </form>
</div>


<?php
include_once("connection.php");
session_start();
//'.md5("$_POST[password]").'

if( isset($_POST["name"]) && isset($_POST["title"]) && isset($_POST["password"]) && isset($_POST["url"])){
$sql_query = "insert into utility.password (Title,username,password,url,user_id) 
values('$_POST[title]','$_POST[name]','$_POST[password]','$_POST[url]','$_SESSION[user_id]')";

mysqli_query($con,$sql_query) or
die("password insertion failed!");

header("Location:./view_password.php");
}



?>


</body>
</html>