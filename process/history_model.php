<?php 

function orderHistory() 
{
    $db = require '../includes/db.php';
    $query = "SELECT * FROM db.orders WHERE CustomerID = " .$_SESSION['CustomerID'];
    $stmt = $db->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
    return $result;
    $db = null;
} 

