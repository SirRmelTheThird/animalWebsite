<?php
require '../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $date = $_POST['Date'];

    $current_date =  date("Y-m-d");

    if ($adult == 0 && $child == 0){
        ?><script>alert("No Tickets Selected");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../tickets.php'>";
        exit;
    }

    if (empty($date)){
        ?><script>alert("No Date Selected");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../tickets.php'>";
        exit; 

    } else {
        if ($date < $current_date) {
        ?><script>alert("Please Choose A Date After The Current Date");</script><?php
        echo "<meta http-equiv='refresh' content='1; url=../tickets.php'>";
        exit; 
        }
    } 
        try {
            $orders = 0;
            $amount = 0;
            if (isset($_SESSION['premium_child_ticket_num'])) {
                $_SESSION['premium_child_ticket_num'] += $child;
            } else {
                $_SESSION['premium_child_ticket_num'] = $child;
            }
            
            if (isset($_SESSION['premium_adult_ticket_num'])) {
                $_SESSION['premium_adult_ticket_num'] += $adult;
            } else {
                $_SESSION['premium_adult_ticket_num'] = $adult;
            }
            while ($adult > 0) {
                $orders += 1;
                $amount += 50;
                $adult -= 1;
                }
            
            while ($child > 0) {
                $orders += 1;
                $amount += 25;
                $child -= 1;
                }
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
            
            if (empty($date)) {
                $_SESSION['premium_date'] = 'None';
            } else {
                $_SESSION['premium_date'] = $date;
            }
            header('Refresh: 1; url=../cart.php');
            
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header('Refresh: 1; url=../tickets.php');
        exit;
    
    }

} else {
    header("Location: ../homepage.php?");
    die();
}