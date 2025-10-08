<?php 

function standard_tickets_available() 
{
    $db = require './includes/db.php';
    $query = "SELECT * FROM db.tickets WHERE Type = 'Standard' AND Quantity > 1;"; 
    $stmt = $db->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
    $db = null;
} 

function premium_tickets_available() 
{
    $db = require './includes/db.php';
    $query = "SELECT * FROM db.tickets WHERE Type = 'Premium' AND Quantity > 1;"; 
    $stmt = $db->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
    $db = null;
} 