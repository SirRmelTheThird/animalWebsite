<?php       

    $db_host = "localhost";
    $db_name = "db";
    $db_user = "user";

    $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

    try {

        $db = new PDO($dsn, $db_user);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    } catch (PDOException $e) {
        die("Connection failed:" . $e->getMessage());
    }
?>