<?php
declare(strict_types=1);

function signup_inputs() 
{
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_data"]["username_taken"])) {
        echo '<div class="form-group col-md-12 mt-4">
        <input type="text" name="username" placeholder="Username" value="'. $_SESSION["signup_data"]["username"].'">
        </div>';
    } else {
        echo '<div class="form-group col-md-12">
        <input type="text" name="username" placeholder="Username">
        </div>';
    }
    echo '<div class="form-group col-md-12">
    <input type="password" name="pwd" placeholder="Password">
    </div>';
    
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_data"]["email_registered"]) && !isset($_SESSION["signup_data"]["invalid_email"])) {
        echo '<div class="form-group col-md-12">
        <input type="text" name="email" placeholder="E-mail" value="'. $_SESSION["signup_data"]["email"].'">
        </div>';
    } else {
        echo '<div class="form-group col-md-12">
        <input type="text" name="email" placeholder="E-mail">
        </div>';
    }
}


function check_signup_errors() 
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo"<br>";
        
        foreach($errors as $error){
            echo'<p class="form-error">'. $error .'</p>';
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") 
    {
        echo"<br>";
        echo'<p class="form-success">Signup Success!</p>';
    }
}
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
