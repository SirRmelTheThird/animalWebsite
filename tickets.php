<?php
require 'header.php';
require 'process/ticket_model.php';
$standardTickets = standard_tickets_available();
$premiumTickets = premium_tickets_available();
?>
<style>

    body{
        width: 90%;
        margin: 100px auto;
        background: #f8f8f6;
    }
    .grid{
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-content: center;
        grid-gap: 200px;
    }

    .title{
        text-align: center;
        top: 20vh;
    }

    .standard {
        background: white;
        padding: 20px;
        border-radius: 3px;
        text-align: center;
        box-shadow: 0 3px 6px rgba(0,0,0,.16);
    }

    .premium {
        background: white;
        padding: 20px;
        border-radius: 3px;
        text-align: center;
        box-shadow: 0 3px 6px rgba(0,0,0,.16);
    }

    .button {
        border-radius: 3px;
        border: none;
        padding: 10px;
        background-color: orange;
        color: white;
        width: 200px;
    }

    a {
        text-decoration: none;
        color: white;
        text-decoration-color: none;
        text-decoration-line: none;
    }
</style>
<body>
    <div class="title">
        <h1>Tickets</h1>
    </div>

    <div class="grid">
        <div class="standard">
            <h3>Standard Ticket</h3>
            <p></p>
            <a href="standard_ticket.php">
            <?php if ($standardTickets > 1) { ?>
            <button class="button" type="submit">Prices</button>
            <?php } else {?> 
            <button class="button" type="submit" disabled>Unavailable</button>
            <?php } ?>
            </a>
        </div>
        
        <div class="premium">
            <h3>Premium Ticket</h3>
            <p></p>
            <a href="premium_ticket.php">
            <?php if ($premiumTickets > 1) { ?>
            <button class="button" type="submit">Prices</button>
            <?php } else {?> 
            <button class="button" type="submit" disabled>Unavailable</button>
            <?php } ?>
            </a>
        </div>
    </div>
</body>