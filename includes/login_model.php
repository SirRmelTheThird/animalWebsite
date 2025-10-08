<?php 
declare(strict_types=1);

function get_user(object $db, string $username) 
{
    $query = "SELECT * FROM db.customers WHERE Username = :username;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
} 