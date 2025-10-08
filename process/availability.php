<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $startdate = $_POST['startDate'];
    $enddate = $_POST['endDate'];

    if (empty($startdate)){
        ?><script>alert("Enter Start Date");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../accommodations.php'>";
        exit; 
    }  

    if (empty($enddate)){
        ?><script>alert("Enter End Date");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../accommodations.php'>";
        exit; 
    }  
    try {
    function availability ($startdate, $enddate) {
        $db = require '../includes/db.php';
        $query = $db->prepare("SELECT availability.*, Accommodation.* 
                       FROM db.availability 
                       JOIN Accommodation ON availability.AccommodationID = Accommodation.AccommodationID
                       WHERE availability.StartDate >= :startDate AND availability.EndDate <= :endDate");
        $query->bindParam(":startDate", $startdate);
        $query->bindParam(":endDate", $enddate);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $result = availability($startdate, $enddate);
        header('Location: ../accommodations.php?result=' . urlencode(json_encode($result)));
        exit;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header('Refresh: 1; url=../accommodations.php');
        exit;
        
    } 
}