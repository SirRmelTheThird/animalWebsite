<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'includes/session.php';
    require 'process/reward_points.php';
    if (!isset($_SESSION['CustomerID'])) {
        header('Location: login_page.php');
        $_SESSION['errors_login'] = array('Please Login To Purchase');
        exit;
    } else { 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            width: 90%;
            margin: 100px auto;
            background-color: #f8f8f6;
        }
        .box {
            display: grid;
            grid-template-columns: 1fr 300px;
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
            grid-row: 1 / 1;
            grid-column: 2;
        }

        .title {
            text-align: center;
            top: 20vh;
        }
        .row {
            display: grid;
            grid-template-columns: auto auto;

        }
        input[type=text] {
        width: 70%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        label {
        margin-bottom: 10px;
        display: block;
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
        .order > div {
            padding: 20px;
        }

    </style>
</head>
<body>
<?php 
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
        $Guests = isset($_SESSION['guests']) ? $_SESSION['end_date'] : 'None';
    ?>
    <div class="title">
        <h1>Basket</h1>
    </div>
    <div class="box">
        <div class="ticket-box">
            <form action="process/process_order.php" method="POST">
            <div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">
                        <form action="/process/process_order.php">

                            <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="name" placeholder="John M. Doe">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="New York">

                                <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                                <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
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
                <div>
                <button class="button" type="submit" value="Submit">
                    Pay Now
                </button>
                </div>
                <div>
                <?php if ($_SESSION['available_points']/10 > $_SESSION['amount']) { ?>
                    <button class="button" type="submit" value="Submit">
                        Pay With Points Now
                    <input type="hidden" name="pointButton">
                </button>
                <?php } ?>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php } ?>
</body>
</html>
<?php 
}
?>
