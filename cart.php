<?php
require 'header.php';
?>
<style>

body{
    width: 90%;
    margin: 100px auto;
    background-color: #f8f8f6;
}
.box {
  display: grid;
  grid-template-columns: 700px 300px;
  column-gap: 30px;
  row-gap: 10px;
  padding-top: 100px;
  justify-self: center;
  justify-content: center;
}

.box > div {
    background-color: white;
    box-shadow: 0 3px 6px rgba(0,0,0,.16);
    padding: 20px;
}

.summary-box {
  grid-row: 1 / span 4;
  grid-column: 2;
}


.ticket-box > form > div {
    line-height: 0.5;
    word-spacing: 0.5rem;
    padding: 20px;
    background-color: #f8f8f6;
    border: 5px solid white;
}


.title{
    text-align: center;
    top: 20vh;
}

.quantity, .total, .points {
    display: flex;
    font-size: larger;
}

.right {
    margin-left: auto;
}

.button {
    width: 100%;
    font-size: larger;
    background-color: orange;
    border: none;
    margin-top: auto;
}
.back-box {
    width: 40%;
}
</style>
<body>
    <?php if (isset($_SESSION['orders'])) { 
        $numberOfOrders = $_SESSION['orders'];
        $Amount = $_SESSION['amount'];
        $pDate = isset($_SESSION['premium_date']) ? $_SESSION['premium_date'] : 'None';
        $sDate = isset($_SESSION['standard_date']) ? $_SESSION['standard_date'] : 'None';
        $pendingPoints = pendingPoints($Amount);
        $_SESSION['Points'] = $pendingPoints;
        $Accommodation = isset($_SESSION['accommodation']) ? $_SESSION['accommodation'] : null;
        $Location = isset($_SESSION['accommodation_location']) ? $_SESSION['accommodation_location'] : null;
        $startDate = isset($_SESSION['start_date']) ? $_SESSION['start_date'] : 'None';
        $endDate = isset($_SESSION['end_date']) ? $_SESSION['end_date'] : 'None';
        $Guests = isset($_SESSION['guests']) ? $_SESSION['guests'] : null;
    ?>
    <div class="title">
        <h1>Basket</h1>
    </div>
    <div class="box">
        <div class="ticket-box">
            <form action="payment.php" method="POST">
            <?php if (!empty($_SESSION['premium_adult_ticket_num']) || !empty($_SESSION['premium_child_ticket_num'])) { ?>
            <div>
                <?php if (!empty($_SESSION['premium_adult_ticket_num'])) { ?>
                    <h3 class="right">Premium Ticket</h3>
                    <p>Type: Adult</p>
                    <p>Date: <?= $pDate; ?> </p>
                    <p>Quantity: <?= $_SESSION['premium_adult_ticket_num']; ?> </p>
                <?php } ?>
                
                <?php if (!empty($_SESSION['premium_child_ticket_num'])) { ?>   
                    <h3 class="right">Premium Ticket</h3>
                    <p>Type: Child</p>
                    <p>Date:  <?= $pDate; ?></p>
                    <p>Quantity: <?= $_SESSION['premium_child_ticket_num']; ?> </p>
                <?php } ?>
            </div>
            <?php } ?>
            
            <?php if (!empty($_SESSION['standard_adult_ticket_num']) || !empty($_SESSION['standard_child_ticket_num'])) { ?>
            <div>
                <?php if (!empty($_SESSION['standard_adult_ticket_num'])) { ?>
                    <h3 class="right">Standard Ticket</h3>   
                    <p>Type: Adult</p>
                    <p>Date:  <?= $sDate; ?></p>
                    <p>Quantity: <?= $_SESSION['standard_adult_ticket_num']; ?> </p>
                <?php } ?>
                
                <?php if (!empty($_SESSION['standard_child_ticket_num'])) { ?>
                    <h3 class="right">Standard Ticket</h3>   
                    <p>Type: Child</p>
                    <p>Date:  <?= $sDate; ?></p>
                    <p>Quantity: <?= $_SESSION['standard_child_ticket_num']; ?></p>
                <?php } ?>
            </div>
            <?php } ?>
            <div>
            <?php if (isset($_SESSION['accommodation'])) {?>
                <h3 class="right"> <?= $Accommodation ?> </h3>
                <p>Location: <?= $Location ?></p>
                <p>Guests:  <?= $Guests; ?></p>
                <p>From:  <?= $startDate; ?></p>
                <p>To:  <?= $endDate; ?></p>
                <?php } ?>
            </div>
            
        </div>
        <div class="back-box">
            <a href="javascript:history.back()">Continue Shopping</a>
        </div>
        <div class="summary-box">
            <h3>Order Summary</h3>
            <div class="quantity">
                <p>Items</p>
                <p class="right"> <?= $numberOfOrders ?></p>
            </div>
            <div class="total">
                <p>Total</p>
                <p class="right"> $<?= $Amount ?> </p>
            </div>
            <div class="points">
                <p>Points</p>
                <p class="right"> <?= $pendingPoints ?> </p>
            </div>
            <div class="order">
                <button class="button" type="submit" value="Submit">
                    Check Out
                </button>
            </div>
            </form>
        </div>
    </div>
    <?php } else { ?>
        <div class="title">
        <h1>Basket</h1>
    </div>
    <div class="box">
        <div class="ticket-box">
            <p>No Items</p>
        </div>
        <div class="back-box">
            <a href="javascript:history.back()">Continue Shopping</a>
        </div>
        <div class="summary-box">
            <h3>Order Summary</h3>
            <div class="quantity">
                <p>Items</p>
                <p class="right"> 0 </p>
            </div>
            <div class="total">
                <p>Total</p>
                <p class="right"> $0 </p>
            </div>
            <div class="points">
                <p>Points</p>
                <p class="right"> 0 </p>
            </div>
            <div class="order">
                <button class="button" type="submit" value="Submit">
                    Check Out
                </button>
            </div>
        </div>  
    </div>
<?php } ?>