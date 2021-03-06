<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$product = $_GET['productKeyword'];

$namedParameters = array();

//This query works BUT it allows SQL INJECTION (because it's using single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$sql = "SELECT * FROM `om_product` WHERE 1"; //Retrieves ALL records

if (!empty($product)) { //user entered a product keyword
    $sql .=  " AND productName LIKE :productName"; // You must have an extra space 
    $namedParameters[":productName"] = "%" . $GET['product'] . "%";
}

//Checks whether user has slected a category of product
if(!empty($_GET['category'])){
    $sql .= " AND catId = categoryId";
    $namedParameters[":categoryId"] = $_GET['category'];
}

//Checks whether user has typed something in the price text boxes
if(!empty($_GET['priceFrom'])){
    $sql .= " AND price >= :priceFrom";
    $namedParameters[":priceFrom"] = $_GET['priceFrom'];
}

//Checks whether user has typed something in the price text boxes
if(!empty($_GET['priceTo'])){
    $sql .= " AND price <= :priceTo";
    $namedParameters[":priceTo"] = $_GET['priceTo'];
}

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //debugging    

echo json_encode($records);

?>