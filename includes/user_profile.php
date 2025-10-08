<?php
    require_once 'session.php';
    require_once 'db.php';
    require_once 'login_model.php';
    require_once '../process/history_model.php';

    $user = get_user($db, $_SESSION['Username']); 
    $orders = orderHistory();
    if (!empty($user)) {  
?>

<style>
    .grid{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        width: 700px;
        height: 20px;
       
    }
    .title {
        display: flex;
        flex-direction: row;
    }
    /* .grid  {
        display: flex;
        flex-direction: row;

    } */
    /* .grid > div {
        padding: 5px;
    } */
</style>
<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
    </head>
    <body>
    <h2>User Profile</h2>
    <div>
        <p><strong>First Name:</strong> <?php echo $user['First_Name'];?></p>
        <p><strong>Last Name:</strong> <?php echo $user['Last_Name'];?></p>
        <p><strong>Username:</strong> <?php echo $user['Username'];?></p>
        <p><strong>Email:</strong> <?php echo $user['Email'];?></p>
    </div>

    <strong>Order History</strong>
    <div class="title">
        <p><strong>Order ID</strong></p>
        <p><strong>Ticket ID</strong></p>
        <p><strong>Quantity</strong></p>
        <p><strong>Order Date</strong></p>
    </div>
    <?php } if (!empty($orders)) {
        foreach($orders as $order) {?>
    <div class="grid">
        <div>
        <!-- <p><strong>Order ID:</strong></p> -->
        <p><?php echo $order['OrderID'];?></p>
        </div>

        <div>
        <!-- <p><strong>Ticket ID:</strong></p> -->
        <p><?php echo $order['TicketID'];?></p>
        </div>

        <div>
        <!-- <p><strong>Quantity</strong></p> -->
        <p><?php echo $order['Quantity'];?></p>
        </div>

        <div>
        <!-- <p><strong>Order Date</strong></p> -->
        <p><?php echo $order['OrderDate'];?></p>
        </div>
    </div>

    <?php }?>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    </body>
</html>
<?php
    } else { echo "Profile not found."; }
    $sql = null;
    $db = null;
?>