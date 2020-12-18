
<!DOCTYPE html>
<html> 
<head> 
<title>Search</title> 
<link rel="stylesheet" href="CSS/find.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head> 

<body> 
<div id="container">
<h1>Search Password Details</h1> 
    <form id="searchform" method="post"> 
<table id="search"> 
        <tr><td><label for="query">Find : </label> </td>
        <td><input type="text" name="query" id="query" /> </td></tr>
        <tr><td colspan="2">Search By</td></tr>
        <tr><td>title : <input type="radio" name="search_type" id="title" value="Title" checked></td>
        <td>User Name :<input type="radio" name="search_type" id="username" value="username"></td></tr>
        <tr><td>Password : <input type="radio" name="search_type" id="password" value="password"></td>
        <td>URL : <input type="radio" name="search_type" id="url" value="url"></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="search" id="button" /> </td></tr>
</table> 
    </form> 
    <div id="results">
    <?php
include_once("connection.php");
session_start();


if( isset($_POST["query"]) && isset($_POST["search_type"]) ){

    $sql_query = "select *
    from utility.password
    where utility.password.".$_POST["search_type"]." = '$_POST[query]' and
    utility.password.user_id = '$_SESSION[user_id]'
    ";


$records = mysqli_query($con,$sql_query);

$st="";

if(mysqli_num_rows($records) > 0){
    $st .= "<table id='records' style='border-bottom:2px solid white;'><tr><th>Title</th><th>Username</th><th>Password</th><th>URL</th></tr>";
    while($data = mysqli_fetch_object($records)){
      $st .= "<tr><td>".$data->Title."</td>";
      $st .=  "<td>".$data->username."</td>";
      $st .=  "<td>".$data->password."</td>";
      $st .=  "<td>".$data->url."</td></tr>";
    }
    $st .= "</table>";
}else{
  $st = "No record Found!";
} 

echo $st;


}



?>

    </div> 

</div>
</body> 
</html> 