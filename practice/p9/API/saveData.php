<?php
session_start();
//TODO: Save incoming data into session


$arr = array();
$arr[":name"] = $_GET["name"];
$arr[":email"] = $_GET["email"];

$sql = "INSERT INTO 'users' ( `name`, `email`) 
    VALUES (:name, :email)";

if(!isset($_SESSION["progress"])){
    $_SESSION["progress"] = 0;
}

echo json_encode($_SESSION)
?>