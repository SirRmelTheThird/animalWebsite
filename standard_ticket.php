<?php
require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    width: 90%;
    margin: 100px auto;
    background: #f8f8f6;
}
.box {
  margin-top: 150px;
  display: grid;
  grid-template-columns: 400px 500px;
  justify-content: center;
  grid-gap: 30px;
  padding-top: 100px;
}

.box > div {
    background-color: white;
    box-shadow: 0 3px 6px rgba(0,0,0,.16);
    padding: 20px;
    text-align: center;
    border: 2px solid lightgray;
}

.ticket-box {
  grid-row: 1 / span 3;
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

.btn {
    display: flex;
    margin-left: auto;
}

.btn button{
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
            <img src="images/giraffe.jpg">
            <h1>Standard Ticket</h1>
        </div>
        <div class="price-box">
            <form action="process/process_standard_ticket.php" method="POST">
                <div class="options">
                    <p style="font-size: 30px;">Adult Ticket</p>
                    <div class="btn">
                        <button id="sub" type="button"> - </button>
                        <var id="adult_ticket_value" name="adult" style="font-size: 30px;" >0</var>
                        <input type="hidden" name="adult" id="adult_input" value="0">
                        <button id="add" type="button"> + </button>
                    </div>
                </div>

                <div class="options">
                    <p style="font-size: 30px;">Child Ticket</p>
                    <div class="btn">
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