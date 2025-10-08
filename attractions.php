<?php
require 'header.php';
?>
<!DOCTYPE html>
<style>
body{
    width: 90%;
    margin: 100px auto;
    background: #f8f8f6;
}
.grid{
    display: grid;
    grid-template-columns: 300px auto;
    justify-content: center;
    grid-gap: 20px;
}

.title{
    text-align: center;
    top: 20vh;
}

/* .columns{
    display: grid;
    grid-template-columns: auto auto;
    justify-content: center;
    background-color: #e0dac9;
    background-size: cover;
    background-position: center center;
    height: 55vh;
    gap: 10px;
} */

.grid > div {
    width: 100%;
}

.text {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.carousel-item {
    width: 300px;
    height: 200px;
}

.carousel-item img {
    height: 100%;
    width: 100%;
}

.carousel{
    background-color: white;
    box-shadow: 0 3px 6px rgba(0,0,0,.16);
    text-align: center;
    border: 2px solid lightgray;
}
</style>
<body>
    <div class="title">
        <h1>Faciltes</h1>
    </div>

    <div class="grid">

        <div id="attraction" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#attraction" data-slide-to="0" class="active"></li>
                <li data-target="#attraction" data-slide-to="1"></li>
                <li data-target="#attraction" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img  src="/images/hut.jpg">
                </div>
                <div class="carousel-item">
                <img src="/images/grass.jpg">
                </div>
                <div class="carousel-item">
                <img  src="/images/train.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#attraction" role="button" data-slide="prev">
                <span class="material-symbols-outlined">navigate_before</span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#attraction" role="button" data-slide="next">
                <span class="material-symbols-outlined">navigate_next</span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div>
            <h2>Attractions</h2>
            <p>Within our sprawling wildlife sanctuary and alongside our luxurious on-site hotel, you'll find a multitude of attractions to captivate visitors of all ages. Explore fascinating animal exhibits, where lions roar and elephants trump, or embark on a journey through our immersive animal habitats. Engage in up-close animal encounters led by our expert zookeepers and participate in educational programs designed to inspire and educate. Let your imagination run wild in our children's play areas, where young adventurers can explore, climb, and discover. Be dazzled by thrilling animal shows that showcase the beauty and intelligence of our resident creatures. For a leisurely tour of the park, hop aboard our zoo train or tram and soak in the sights and sounds of the wildlife sanctuary.</p>
        </div>

        <div id="shops" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#shops" data-slide-to="0" class="active"></li>
                <li data-target="#shops" data-slide-to="1"></li>
                <li data-target="#shops" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block" src="/images/giftshop.jpg">
                </div>
                <div class="carousel-item">
                <img class="d-block" src="/images/giftshop2.jpg">
                </div>
                <div class="carousel-item">
                <img class="d-block" src="/images/giftshop3.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#shops" role="button" data-slide="prev">
                <span class="material-symbols-outlined">navigate_before</span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#shops" role="button" data-slide="next">
                <span class="material-symbols-outlined">navigate_next</span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div>
            <h2>Giftshop</h2>
            <p>After a day of exploration, browse our charming gift shops overflowing with treasures and safari-themed souvenirs. From stuffed animals and plush toys to safari clothing and adventure gear, our gift shops offer a delightful array of mementos to commemorate your visit.Before you depart, don't forget to peruse our collection of safari treasures, where you can find the perfect souvenir to take home. From handcrafted artisan goods to unique wildlife-inspired décor, our safari treasures offer a piece of the adventure to cherish forever.</p>
        </div>

        <div id="restaurant" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#restaurant" data-slide-to="0" class="active"></li>
                <li data-target="#restaurant" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block" src="/images/res.jpg">
                </div>
                <div class="carousel-item">
                <img class="d-block" src="/images/res2.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#restaurant" role="button" data-slide="prev">
                <span class="material-symbols-outlined">navigate_before</span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#restaurant" role="button" data-slide="next">
                <span class="material-symbols-outlined">navigate_next</span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div>
            <h2>Restaurants</h2>
            <p>Refuel and recharge at our exquisite restaurants, where culinary delights and scenic views await. Whether you crave a casual meal or a gourmet dining experience, our restaurants offer an array of tantalizing options to satisfy every palate.</p>
        </div>

        </div>


        <?php
require 'footer.php';
?>