<?php

//$serverName = "mysql:host=mbp-von-derrick";
$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$db = "mydb";

$conn = new mysqli("127.0.0.1","root","","mydb");

if ($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
?>
