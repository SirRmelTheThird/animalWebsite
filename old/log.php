<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>  
<body>
    <section id="add">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto ">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <a href="homepage.php"><h4><span class="d-flex material-symbols-outlined text-white" style="font-size:25px;">first_page</span></h4></a>
                            <div class="d-flex justify-content-center">
                            <h4><span class="material-symbols-outlined" style="font-size:60px;">passkey</span></h4>
                            </div>
                        </div>
                        <form action="/includes/login.inc.php" method="post">
                            <div class="form-group col-md-12 mt-4">
                                <input type="text" class="form-control" name="username" placeholder="Username" style="outline:none; padding: 0.4rem; border-radius: 5px; border: none; box-shadow: 0 0 10px rgb(202, 202, 202);">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="pwd" placeholder="Password" style="outline:none; padding: 0.4rem; border-radius: 5px; border: none; box-shadow: 0 0 10px rgb(202, 202, 202);">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-secondary" id="submitButton" style="display: block;">Log In</button>
                            </div>
                            <div>
                                <p class="d-flex justify-content-center" style="display: block;"> <?php check_login_error(); ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>