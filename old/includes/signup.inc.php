<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';     

        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors['empty_input'] = "Fill in All Field";
        }
        if (is_email_valid($email)) { 
            $errors['invalid_email'] = "Invaild Email";
        }
        if (is_username_taken($db, $username)) {  
            $errors['username_taken'] = "Username Has Been Taken";
        }
        if (is_email_registered($db, $email)) {  
            $errors['email_registered'] = "Email has been already registered";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors; 

            $signupData = [
                "username" => $username,
                "email"=> $email,
            ];
            
            $_SESSION['signup_data'] = $signupData;
            header("Location: ../sign.php?");
            die();
        }

        create_user($db, $username, $pwd, $email);
        header("Location: ../homepage.php?=signup=success");
        $db = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../homepage.php?");
    die();
}

?>