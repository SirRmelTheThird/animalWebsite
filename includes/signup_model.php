<?php 
declare(strict_types=1);

function get_username(object $db, string $username) 
{
    $query = "SELECT Username FROM customers WHERE Username = :username;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
}

function get_email(object $db, string $email) 
{
    $query = "SELECT Username FROM db.customers WHERE Email = :email;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
}


function set_user(object $db, string $fname, string $lname, string $username, string $pwd, string $email) 
{
    $query = "INSERT INTO db.customers (`First_Name`, `Last_Name`, Username, Pwd, Email) VALUES (:fname, :lname, :username, :pwd, :email);"; 
    $stmt = $db->prepare($query);

    $option = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $option);
    
    $stmt->bindParam(":fname", $fname);
    $stmt->bindParam(":lname", $lname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    
}