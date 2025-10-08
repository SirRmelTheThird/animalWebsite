<?php 

function pendingPoints($Amount) 
{
    $points = $Amount * 10;
    return $points;
} 

function Points($CustomerID) 
{
    $db = require './includes/db.php';
    $query = "SELECT points FROM db.points WHERE CustomerID = :CustomerID;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return $_SESSION['available_points'] = $stmt = $stmt->fetchColumn();
    } else {
        $query = "INSERT INTO points (CustomerID, Points) VALUES (:CustomerID, 0)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':CustomerID', $CustomerID);
        $stmt->execute();
        $db = null;
    }
    $db = null;


} 