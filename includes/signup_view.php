<?php
declare(strict_types=1);

function signup_inputs_username() 
{
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_data"]["username_taken"])) {
        echo 'value="' . htmlspecialchars($_SESSION["signup_data"]["username"]) . '"';
    } else {
        echo 'value=""';
    }
}

function signup_inputs_email() 
{
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_data"]["email_registered"]) && !isset($_SESSION["signup_data"]["invalid_email"])) {
        echo 'value="' . htmlspecialchars($_SESSION["signup_data"]["email"]) . '"';
    } else {
        echo 'value=""';
    }
}

function signup_inputs_fname() 
{
    if (isset($_SESSION["signup_data"]["fname"]) && !isset($_SESSION["signup_data"]["empty_input"])) {
        echo 'value="' . htmlspecialchars($_SESSION["signup_data"]["fname"]) . '"';
    } else {
        echo 'value=""';
    }
}

function signup_inputs_lname() 
{
    if (isset($_SESSION["signup_data"]["lname"]) && !isset($_SESSION["signup_data"]["empty_input"])) {
        echo 'value="' . htmlspecialchars($_SESSION["signup_data"]["lname"]) . '"';
    } else {
        echo 'value=""';
    }

}

function check_signup_errors() 
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo"<br>";
        
        foreach($errors as $error){
            echo'<p class="form-error">'. htmlspecialchars($error) .'</p>';
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") 
    {
        echo"<br>";
        echo'<p class="form-success">Signup Success!</p>';
    }
}
?>
