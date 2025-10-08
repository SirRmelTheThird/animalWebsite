<?php 
declare(strict_types=1);

function get_username(object $db, string $username) 
{
    $query = "SELECT username FROM db WHERE username = :username;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
}

function get_email(object $db, string $email) 
{
    $query = "SELECT username FROM db WHERE email = :email;"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO:: FETCH_ASSOC);
    return $result;
}


function set_user(object $db, string $username, string $pwd, string $email) 
{
    $query = "INSERT INTO db (username, password, email) VALUES (:username, :password, :email);"; 
    $stmt = $db->prepare($query);

    $option = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $option);
    
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}