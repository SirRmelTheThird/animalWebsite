<?php
require 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8JzCtrnqLoqid2zOm5K+2m0aP0F6kozFV9cJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    #deez{
        opacity: 25%;
    }
</style>
<body>
    <nav  id ="deez" class="navbar fixed-top navbar-expand-md navbar-dark bg-secondary mb-3 h-25">
        <div class="opacity-25"></div>
        <div class="container d-flex justify-content-center">
            <div class="collapse navbar-collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Logo <span class="sr-only">Logo</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Bookings <span class="sr-only">Bookings</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                    <?php if (isset($_SESSION["user_id"])): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-sm d-flex justify-content mt-1">
                            <span class="material-symbols-outlined text-white mb-1">account_circle</span>
                            <span class="ml-2" style="font-size: 15px;"><?= $_SESSION["user_username"] ?></span>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split mt-1 mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/includes/user_profile.php">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/includes/Log-out.php"><span class="material-symbols-outlined">logout</span></a>
                        </div>
                    </div>
                    <?php else: ?>
                        <li class="nav-item active">
                            <a class="nav-link" name="login" href="/log.php"> Log In<span class="sr-only">Log In</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" name="signup" href="/sign.php"> Sign Up<span class="sr-only">Sign Up</span></a>
                        </li>
                    <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" >About</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
</body>
</html>
