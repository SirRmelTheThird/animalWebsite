<?php

declare(strict_types= 1);

function check_login_error()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION['errors_login'];

        echo"<br>";
        
        foreach($errors as $error){
            echo'<p class="d-flex justify-content-center form-erorr" style="display:none;">'. htmlspecialchars($error) .'</p>';
        }
        unset($_SESSION['errors_login']);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") 
    {
        echo"<br>";
        echo'<p class="d-flex justify-content-center form-success" style="display:block;">Logged In!</p>';
    }
}