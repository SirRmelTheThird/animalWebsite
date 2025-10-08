<?php
require 'header.php';
require 'process/availability.php';
 ?>

<!DOCTYPE html>
<style>
body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; 
}
.background {
    position: relative;
    width: 100%;
    height: 500px; 
    overflow: hidden;
}
.background img {
    position: relative;
    width: 100%; 
    height: 90vh;
    background-size: cover;
    background-position: center center;
}

.columns{
    display: grid;
    grid-template-columns: auto auto auto auto;
    justify-content: center;
    background-color: #e0dac9;
    background-size: cover;
    background-position: center center;
    height: 95vh;
    gap: 10px;
    line-height: 10px;
}

.text {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.text form {
    display: inline-flex;
    justify-content: center;
    color: orange;
    padding: 15px;
    font-size: small;
    position: relative;
}

.text form p {
    color: black;
    padding-right: 10px;
    padding-top: 5px;
    padding-left: 10px;
    font-size: small;
    position: relative;
}

.box {
    /* height: auto; */
    background-color: white;
    box-shadow: 0 3px 6px rgba(0,0,0,.16);
    padding: 20px;
    overflow: hidden;
}

.text form, .date, .guest, .book{
    display: flex;
    justify-content: center;
    color: orange;
    padding: 15px;
    font-size: small;
    position: relative;
}
input[type="date"]{
    background-color: orange;
    padding: 6px;
    font-family: "Roboto Mono",monospace;
    color: #ffffff;
    border: none;
    outline: none;
    width: 25%;
    height: 30%;
    border-radius: 5px;
}

.button{
    padding-left: 10px;
    height: 10%;
    width: 20%;
}

.columns {
    padding: 20px;
}
.submit{
    border-radius: 3px;
    border: none;
    padding: 10px;
    background-color: orange;
    color: white;
    width: 200px;
}
</style>
<body>
    <div class="background">
        <img id="beds_img" src="images/beds.jpg">
    </div>

    <div class="text">
        <form action="process/availability.php" method="POST">
            <p>Check-in</p>
                <input type="date" name="startDate">
            <p>Check-out</p>
                <input type="date" name="endDate">
            <div class="button">
                <button name="button2" type="submit">
                    <p>Check Availabilty</p>
                </button>
            </div>
        </form>
    </div>
    <div class="columns">
        <?php  
        require 'process/availability.php';
        if (isset($_GET['result'])) {
            $result = json_decode(urldecode($_GET['result']), true);
            if (empty($result)) {?>
                <div>
                    <p>No accommodations available at this date</p>
                </div>
            <?php } else {
            foreach ($result as $column) : ?>
            <div class="box" >
            <form action="/process/process_accommodation.php" method="POST">
                <div class="name">
                        <h3><?= $column['Name']; ?></h3>
                    </div>

                    <div class="location">
                        <h4>Location: <?= $column['Location']; ?></h4>
                    </div>

                    <div class="desc">
                        <p>Description:</p>
                        <p style="font-size: 11px;"><?= $column['Desc']; ?></p>
                    </div>

                    <div class="price">
                        <h4>£<?= $column['Price']; ?> per Night</h4>
                    </div>

                    <div class="date">
                        <input type="date" name="startDateAccommodation">
                        <input type="date" name="endDateAccommodation">
                    </div>

                    <div class="guest">
                        <select name="guests" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <input type="hidden" name="ID" value="<?= $column['AccommodationID']; ?>">

                    <div class="book">
                        <a href="cart.php">
                            <button type="submit" class="submit">
                                Book
                            </button>
                        </a>
                    </div>
                    </form>                   
                </div>
            <?php endforeach;} }?>
    </div>
<?php
require 'footer.php';
?>
</body>
</html>