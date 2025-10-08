<?php
require 'includes/session.php';
require 'process/reward_points.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8JzCtrnqLoqid2zOm5K+2m0aP0F6kozFV9cJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script>
    window.addEventListener("scroll", (event) => {
        var nav = document.getElementById("nav");
        if(window.scrollY > 0) {
            nav.style.height = "100px";
            nav.style.opacity = "95%";
            nav.style.transition = "height 1.3s";
        } else {
            nav.style.height = "75px";
        }
    });

</script>
<style>
    *{
        box-sizing: border-box;
    }

    #nav{
        margin-bottom: 3px;
        background-color: rgba(0, 0, 0, 0.8);
        height: 75px;

    }
    .collapse, .container{
        display: flex;
        justify-content: center; 
    }

    .dropdown-item:hover{
        background-color: orange;
    }

    .dropdown-item:active{
        background-color: orange;
    }
    .dropdown-menu{
        border-top: 5px orange solid;
        background-color: rgba(0, 0, 0, 0.9);
    }

    #pf{
        vertical-align: middle;
    }
</style>
<body>
    <nav id ="nav" class="navbar fixed-top navbar-expand-lg">
        <div class="container text-white">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="homepage.php">
                            <img style="height: 30px;" src="images/logo.png" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn dropdown" data-toggle="dropdown" style="margin-bottom: 1px;">
                                <span id="pf" class="text-white">Bookings</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-white" href="tickets.php">Tickets</a>
                                <a class="dropdown-item text-white" href="accommodations.php">Accommodations</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn dropdown" data-toggle="dropdown" style="margin-bottom: 1px;">
                                <span id="pf" class="text-white">Visits</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-white" href="attractions.php">Attractions</a>
                                <a class="dropdown-item text-white" href="educational.php">Educational Visits</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION["CustomerID"])): ?>
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="pf" class="material-symbols-outlined">account_circle</span>
                                    <span id="pf" style="font-size: 15px;"><?= $_SESSION["Username"] ?></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-white" href="/includes/user_profile.php">Profile</a>
                                    <a class="dropdown-item text-white" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="/includes/logout.php"><span class="material-symbols-outlined">logout</span></a>
                                </div>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="cart.php">
                            <?php if (isset($_SESSION["orders"])): ?>
                                <span class="material-symbols-outlined">shopping_cart</span>
                                <span class="badge badge-light"><?= $_SESSION["orders"] ?></span>
                            <?php else: ?>
                                <span class="material-symbols-outlined">shopping_cart</span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white"> Points: <?= Points($_SESSION["CustomerID"]) ?> </a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/login_page.php">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/signup_page.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active text-white" href="cart.php">
                            <?php if (isset($_SESSION["orders"])): ?>
                                <span class="material-symbols-outlined">shopping_cart</span>
                                <span class="badge badge-light"><?= $_SESSION["orders"] ?></span>
                            <?php else: ?>
                                <span class="material-symbols-outlined">shopping_cart</span>
                            <?php endif; ?>
                        </a>
                        </li>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
        </div>
    </nav>
</body>
</html>