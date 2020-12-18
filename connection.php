<?php

$host_name =  "localhost";
$db_user= "root";
$pass = "";
$database = "utility";

$con = mysqli_connect($host_name,$db_user,$pass)
or die('Could not establish connection to db server.' );

mysqli_query($con,"CREATE DATABASE IF NOT EXISTS utility");

mysqli_query($con,"CREATE TABLE  IF NOT EXISTS utility.user (id INT NOT NULL AUTO_INCREMENT 
,username VARCHAR( 32 ) NOT NULL
 ,password VARCHAR( 32 ) NOT NULL 
 ,PRIMARY KEY ( id ) )");

mysqli_query($con,"CREATE TABLE  IF NOT EXISTS utility.password (pass_id INT NOT NULL AUTO_INCREMENT ,
Title VARCHAR( 32 ) NOT NULL ,
user_id INT NOT NULL,
username VARCHAR( 32 ) NOT NULL ,
password VARCHAR( 64 ) NOT NULL ,
url VARCHAR( 256 ) NOT NULL ,
PRIMARY KEY ( pass_id ),
FOREIGN KEY (user_id) REFERENCES utility.user(id) )");

mysqli_select_db($con,$database)
or die('Could not select database' );



?>