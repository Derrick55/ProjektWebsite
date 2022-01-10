<?php

//$serverName = "mysql:host=mbp-von-derrick";
$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$db = "Form";

/* $con = new mysqli("127.0.0.1","root","","Form");

if ($con->connect_error){
    die("connection failed".$con->connect_error);
}else{
    echo "connection succefull etablished";
} */

$con = mysqli_connect("127.0.0.1","root","","Form");
if(mysqli_connect_error()){
    exit("an Error Occured".mysqli_connect_error());
}
if(!isset($_POST['username'],$_POST['email'],$_POST['Passwort'])){
    exit ('Empty Field(s)');
}

if (empty($_POST['username'] || empty($_POST['Passwort']) || empty($_POST['email']))){
    exit('Values Empty');
}

if ($stmt = $con->prepare('SELECT id,Passwort FROM newUser WHERE username = ?')){
    $stmt -> bind_param('s', $_POST['username']);
    $stmt ->execute();
    $stmt ->store_result();

    if( $stmt ->num_rows()>0){
        echo 'Username already exist. Please try again';
    }else{
        if($stmt = $con->prepare('INSERT INTO newUser (username,email,Passwort) VALUES (?, ?, ?)')){
            $Username = $_POST['username'];
            $email = $_POST['email'];
            $passwort = password_hash($_POST['Passwort'],PASSWORD_DEFAULT);
            $stmt ->bind_param('sss',$Username, $email,$passwort);
            $stmt ->execute();

            echo 'succefully registered';
        }else{
            echo 'error occured';
        }
    }
    $stmt ->close();
}else{
    echo "Error occured";
}
$con->close();
