<?php

// use FTP\Connection;

    $db_host = "localhost";
    $db_name = "home";
    $db_user = "root";

    $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

    try {

        $db = new PDO($dsn, $db_user);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    } catch (PDOException $e) {
        die("Connection failed:" . $e->getMessage());
        // echo $e->getMessage();
        // exit;
    }
?>