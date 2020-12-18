<?php
include_once("connection.php");
session_start();


if( isset($_POST["query"]) && isset($_POST["search_type"]) ){

    $sql_query = "select *
    from utility.password
    where Title = '$_POST[query]' and
    utility.password.user_id = '$_SESSION[user_id]'
    ";


$records = mysqli_query($con,$sql_query);

$st="";

if(mysqli_num_rows($records) > 0){
    $st .= "<table id='records' ><tr><th>Title</th><th>Username</th><th>Password</th><th>URL</th></tr>";
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
