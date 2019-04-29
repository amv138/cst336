<?php
// Debug
//https://anvasquez-amv138.c9users.io/cst336/labs/lab8/api/favoritesAPI.php?action=keyword
//receives these parameters: action, url, keyword

// :keyword = "named parameters"
 include 'dbConnection.php';
 $conn = getDatabaseConnection("quiz");


    $arr = array();
    
    $arr[":email"] = $_GET["email"];
    $arr[":score"] = $_GET["score"];
    
  
   $sql = "INSERT INTO quiz ( `email`, `score`) 
    VALUES (:email, :score)";
    
    //$sql = "SELECT * FROM quiz WHERE score = $score";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    //$sql ="SELECT COUNT(1) totalproducts FROM om_product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);

?>