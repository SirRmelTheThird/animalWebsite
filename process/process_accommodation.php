<?php
require '../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['startDateAccommodation'];
    $endDate = $_POST['endDateAccommodation'];
    $id = $_POST['ID'];
    $current_date =  date("Y-m-d");
    $Guests = $_POST['guests'];

    if (isset($_SESSION['accommodation'])) {
        ?><script>alert("Can Not Book More Than One Accommodation");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../accommodations.php?'>";
        exit;
    }
    if (empty($startDate) || empty($endDate)){
        ?><script>alert("No Date Selected");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../accommodations.php?'>";
        exit; 

        if ($startDate > $endDate){
            ?><script>alert("Start date cannot be after end date");</script><?php
            echo "<meta http-equiv='refresh' content='1; url=../accommodations.php'>";
            exit; 

        } else {
            if ($startDate < $current_date || $endDate < $current_date) {
            ?><script>alert("Please Choose A Date After The Current Date");</script><?php
            echo "<meta http-equiv='refresh' content='1; url=../accommodations.php'>";
            exit; 
            }
        } 
    }

    try {
        $db = require '../includes/db.php';
        $query = "SELECT * FROM db.accommodation WHERE AccommodationID = :AccommodationID;"; 
        $stmt = $db->prepare($query);
        $stmt->bindParam(':AccommodationID', $id);
        $stmt->execute();
        $accommodation = $stmt->fetch();

        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $days = $start->diff($end)->days;

        $orders = 1;
        $amount = $accommodation['Price'] * $days;
        $_SESSION['guests'] = $Guests;
        $_SESSION['ID'] = $id;


        if (isset($_SESSION['orders'])) {
            $_SESSION['orders'] += $orders;
        } else {
            $_SESSION['orders'] = $orders;
        }

        if (isset($_SESSION['amount'])) {
            $_SESSION['amount'] += $amount;
        } else {
            $_SESSION['amount'] = $amount;
        }

        if (isset($_SESSION['accommodation'])) {
            $_SESSION['accommodation'] = null;
        } else {
            $_SESSION['accommodation'] = $accommodation['Name'];
            $_SESSION['accommodation_location'] = $accommodation['Location'];
        }

        if (empty($startDate)) {
            $_SESSION['start_date'] = 'None';
        } else {
            $_SESSION['start_date'] = $startDate;
        }
        if (empty($endDate)) {
            $_SESSION['end_date'] = 'None';
        } else {
            $_SESSION['end_date'] = $endDate;
        }

        header('Refresh: 1; url=../cart.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header('Refresh: 1; url=../accommodations.php');
        exit;
    }
} else {
    header("Location: ../homepage.php?");
    die();
}
