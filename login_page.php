<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RZA Log In Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <?php 
    require_once 'includes/session.php';
    require_once 'includes/login_view.php';
    ?>
    <style>
        #add{
            border: 20px solid lightgray;
            padding: 20px;
            height: 80vh;
        }
        form {
            padding: 1.5rem;
        }
        input[name="username"], input[name="pwd"]{
            outline: none;
            border-radius: 5px;
            border: none;
            box-shadow: inset 0 -2px 0 0 rgba(202, 202, 202);
        }
        div.card {
            box-shadow: 0 0 50px 0 rgba(202, 202, 202);
        }
        h1{
            font-size: 60px;
            margin-top: 100px;
        }
        body {
            background-color: lightgray;
        }
        .btn {
            outline: none;
            border: none;
            background-color: orange;
        }

    </style>

    <body>
        <center><h1>RZA</h1></center>
        <section id="add">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header text-dark text-decoration-none">
                                <a href="homepage.php" class="text-decoration-none"><h4><span class="material-symbols-outlined text-dark">arrow_back</span></a></h4>
                                    <div class="d-flex justify-content-center">
                                        <h4><span class="material-symbols-outlined" style="font-size:60px;">passkey</span></h4>
                                    </div>
                                </div>
                                <form action="/includes/login.php" method="post">
                                    <div class="form-group col-md-12 mt-2">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group col-md-12 mt-3">
                                        <input type="text" class="form-control" name="pwd" placeholder="Password">
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-secondary" name="submit" id="sumbmitButton" style="display:block;">Log In</button>
                                    </div>
                                    <div>
                                        <p class="d-flex justify-content-center" style="display:block;"> <?php check_login_error(); ?> </p>
                                    </div>
                                    <a href="signup_page.php" class="d-flex justify-content-center">Don't have an account?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
<?php
require 'footer.php';
?>