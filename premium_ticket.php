<?php
require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    width: 90%;
    margin: 10px auto;
    background: #f8f8f6;
}
.box {
  display: grid;
  grid-template-columns: 500px 500px;
  justify-content: center;
  grid-gap: 30px;
  padding-top: 100px;
}

.box > div {
    background-color: white;
    box-shadow: 0 3px 6px rgba(0,0,0,.16);
    padding: 20px;
    text-align: center;
}

.ticket-box {
  grid-row: 1 / span 3;
}

.info {
  grid-column: 1 / span 2;
}

.ticket-info {
  display: grid;
  grid-template-columns: 1fr 1fr;
  
}

.ticket-box img {
    margin: 0;
    height: 90%;
    max-width: 100%;
}

.price-box{
    padding: 10px;
}
.options {
    display: flex;
    align-items: center;
    padding: 20px;
}

.button {
    display: flex;
    margin-left: auto;
}

.button button{
    margin: 4px;
    height: 40px;
    width: 40px;
    border-radius: 90px;
    background-color: orange;
    font-size: 25px;
    border: none;
}

.submit{
    border-radius: 3px;
    border: none;
    padding: 10px;
    background-color: orange;
    color: white;
    width: 200px;
}

input[type="date"]{
    background-color: orange;
    padding: 10px;
    font-family: "Roboto Mono",monospace;
    color: #ffffff;
    border: none;
    outline: none;
    border-radius: 5px;
}


</style>

<body>
    <div class="box">
        <div class="ticket-box">
            <img src="images/seal.jpg">
            <h1>Premium Ticket</h1>
        </div>
            <div class="price-box">
            <form action="process/process_premium_ticket.php" method="POST">
                <div class="options">
                    <p style="font-size: 30px;">Adult Ticket</p>
                    <div class="button">
                        <button id="sub" type="button"> - </button>
                        <var id="adult_ticket_value" name="adult" style="font-size: 30px;" >0</var>
                        <input type="hidden" name="adult" id="adult_input" value="0">
                        <button id="add" type="button"> + </button>
                    </div>
                </div>

                <div class="options">
                    <p style="font-size: 30px;">Child Ticket</p>
                    <div class="button">
                        <button id="sub2" type="button"> - </button>
                        <var id="child_ticket_value" name="child" style="font-size: 30px;" >0</var>
                        <input type="hidden" name="child" id="child_input" value="0">
                        <button id="add2" type="button"> + </button>
                    </div>
                </div>
            </div>

            <div class="calender-box">
                <input type="date" name="Date">
            </div>

            <div class="continue">
                <button class="submit" type="submit" value="Submit">
                    continue
                </button>
            </div>
        </form>
        <div class="info">
            <h4>Premium Ticket at Riget Zoo Adventures</h4>
            <p>Welcome to Riget Zoo Adventures - where every moment is a journey of discovery and excitement! With our Premium Ticket, you'll unlock a world of unforgettable experiences and create memories to last a lifetime.</p>
            <p>Embark on an unforgettable adventure with our Premium Ticket at Riget Zoo Adventures. Book now and prepare for a day filled with wonder, excitement, and endless discoveries!</p>
            <div class="info-grid">
                <div class="ticket-info">
                    <div>
                        <h5>Ticket Prices</h5>
                        <p>Adult (16yrs+): $50</p>
                        <p>Child (3-15yrs): $40</p>
                        <p>Infant (0-2yrs): $0.00</p>
                    </div>
                    <div>
                        <h5>Ticket Details</h5>
                        <p>Immerse yourself in our amazing Drive Through Safari experience, where you'll encounter majestic animals from around the globe in their natural habitats.</p>
                        <p>Explore our Safari Park on foot with our Walking Safari and Boat Safari, and get up close and personal with more of our famous animal residents.</p>
                        <p>Discover a whole host of attractions, including the Riget Railway, Adventure Castle, Rockin' Rhino, and the Hedge Maze.</p>
                        <p>Wander through Riget's stunning grounds and gardens, filled with beauty and tranquility..</p>
                    </div>
                </div>
                <div>
                    <h5>Additional Benefits for Premium Ticket Holders:</h5>
                    <p>Access to group visits, including educational programs tailored for schools, Scouts, Guides, and Youth Groups.</p>
                    <p>Option to extend your stay for more than one day with discounted rates on Premium tickets.</p>
                    <p>Enjoy the services of experienced tour guides who will enhance your visit with fascinating insights and behind-the-scenes stories.</p>
                </div>
                <div>
                    <h5>Need to Know</h5>
                    <p>Pre-booking tickets online in advance is essential to secure your spot.</p>
                    <p>Only debit card/credit card/smartphone payments are accepted on-site, including at our animal feeding experiences, catering areas, and shops.</p>
                    <p>Carers accompanying guests with disabilities can enter free of charge. Simply book Carer Ticket during the booking process in person.</p>
                    <p>Premium Tickets are only available for the duration of the specified ticket validity.</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const subtract = document.getElementById('sub');
    const add = document.getElementById('add');
    const subtract2 = document.getElementById('sub2');
    const add2 = document.getElementById('add2');
    const adultValue = document.getElementById('adult_ticket_value');
    const childValue = document.getElementById('child_ticket_value');

    add.addEventListener('click', function(event) {
    var num = parseInt(adultValue.textContent) + 1; 
    document.getElementById('adult_input').value = num;
    adultValue.textContent = num;

    });

    subtract.addEventListener('click', function(event) {
    var num = Math.max(parseInt(adultValue.textContent) - 1, 0);
    document.getElementById('adult_input').value = num;
    adultValue.textContent = num;

    });

    add2.addEventListener('click', function(event) {
    var num = parseInt(childValue.textContent) + 1; 
    document.getElementById('child_input').value = num;
    childValue.textContent = num;

    });

    subtract2.addEventListener('click', function(event) {
    var num = Math.max(parseInt(childValue.textContent) - 1, 0);
    document.getElementById('child_input').value = num;
    childValue.textContent = num;

    });
</script>