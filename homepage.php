<?php
require 'header.php';
?>
<style>

body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; 
}
.background-fade {
    position: relative;
    width: 100%;
    height: auto; 
}
.background-fade img {
    position: relative;
    width: 100%; 
    height: 100vh;
    background-size: cover;
    background-position: center center;
}

.columns{
    display: grid;
    grid-template-columns: auto auto auto;
    justify-content: center;
    grid-gap: 100px;
    padding: 20px;
    background-color: #e0dac9;
    background-size: cover;
    background-position: center center;
    height: 55vh;
}

.sub {
    width: 350px;
    justify-content: center;
    height: 320px;
    position: relative;
    
}

.sub1 {
    position: relative;
    border-radius: 100%;
    background: white;
    width: 100%;
    height: 100%;
    text-align: center;
    border: 6px solid #333;
    transition: 0.2s ease-out;
    overflow: hidden;
    z-index: 2; 
}

.sub1 img:hover {
    transform: scale(1.3);
    box-shadow: 2px 2px 100px;
    background-color: #d0d0d0;
}
.sub1 img{
    border-radius: 100%;
    height: 100%;
    max-width: 100%;
}

.sub1 h2 {
    position: relative;
    top: -50%;
    color: white;
    z-index: 1;
}

p {
    font-size: small;
    position: relative;
    z-index: 1;
}

.intro {
    display: flex;
    flex-direction: column;
    background-color: #444;
    z-index: 1;
}

.intro div {
    display: inline-flex;
    justify-content: center;
    height: 150px;
    padding: 20px;
}

.intro div img {
    max-height: 100%;
}

.intro p, .intro h2 {
    background-color: #444;
    text-align: center;
    color: white;
    z-index: 1;
}

.intro p {
    padding-left: 400px;
    padding-right: 400px;
}


.home-info {
    display: flex;
    flex-direction: column;
    
}
.title{
    position: absolute;
    top: 20vh;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 4vw;
    text-align: center;
    z-index: 1;                                                                                                                                                                                                                                                                                                                                         
}                                                                        
</style>
<body>
    <div class="background-fade">
        <img id="f2" src="images/deer.jpg">
    </div>

    <div class="home-info">
        <h1 class="title">Riget Zoo Adventures</h1>
    </div>

    <div class="intro">
        <div>
            <img id="intro" src="images/logo.png">
        </div>
        <h2>Embark on a Wildlife Odyssey: Riget Zoo Adventures</h2>
        <p>
            Welcome to Riget Zoo Adventures, where every moment is an expedition into the heart of nature's wonders. Nestled within the breathtaking landscapes, our safari-style wildlife sanctuary beckons adventurers of all ages to discover the untamed beauty of the animal kingdom. As the gateway to unforgettable encounters, Riget Zoo Adventures offers more than just a glimpse into the wild; it's an immersive journey into conservation, education, and unparalleled hospitality. Step into a realm where the call of the wild meets the comfort of luxury, where every stay is an opportunity to reconnect with nature and create lifelong memories. Get ready to embark on the ultimate adventure – welcome to Riget Zoo Adventures.
        </p>
    </div>


    <div class="columns">
        <div class="sub">
            <div class="sub1">
                <a href="accommodations.php">
                <img src="images/hotel.jpg">
                </a>
                <h2>Accomadations</h2>
            </div>
            <p>
                Embark on an exhilarating journey at Riget Zoo Adventure, where every turn leads to captivating attractions. From majestic lions to playful primates, explore diverse habitats teeming with life. Witness thrilling animal encounters, interactive exhibits, and educational experiences that ignite the imagination. Get ready to be amazed at every step. Welcome to the adventure of a lifetime.
            </p>
        </div>
        <div class="sub">
            <div class="sub1">
                <a href="attractions.php">
                <img src="images/train.jpg">
                </a>
                <h2>Attractions</h2>
            </div>
            <p>
                Experience the ultimate adventure at Riget Zoo Adventure, where accommodation meets excitement. Choose from lodges, hotels, and unique stays nestled within the heart of the zoo. Wake up to the calls of the wild and immerse yourself in the magic of the animal kingdom. Your unforgettable getaway starts here.
            </p>
            </div>
        <div class="sub">
            <div class="sub1">
                <a href="tickets.php">
                <img style= "width: 100%; " src="images/ticket.jpg">
                </a>
                <h2 class="mobile">Tickets</h2>
            </div>
            <p>
                Choose your ticket and unlock the wonders of Riget Zoo Adventure! Opt for our Premium Adult ticket for exclusive access and special perks, or enjoy the Standard Adult ticket for a fantastic day of exploration. For the little ones, our Premium Child ticket offers extra excitement, while the Standard Child ticket promises a memorable adventure for all. Dive into the world of wildlife and discovery—your safari awaits!
            </p>
        </div>
    </div>
</body>
<?php
require 'footer.php';