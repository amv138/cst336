<?php 
session_start();
foreach($_POST as $key => $value){
    $_SESSION[$key] = $value;
    
}

echo json_encode($_SESSION);

?>