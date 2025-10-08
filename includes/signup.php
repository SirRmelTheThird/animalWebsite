<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $Cpwd = $_POST["confirm_pwd"];

    try {

        require_once 'db.php';
        require_once 'signup_model.php';
        require_once 'signup_contr.php';     

        $errors = [];

        if (is_input_empty($fname, $lname, $username, $pwd, $email)) {
            $errors['empty_input'] = 'Fill in All Fields';
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
        if (same_password($pwd, $Cpwd)) {
            $errors['incorrect_password'] = 'Password and Confirm Password not the same';
        }

        require_once 'session.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors; 

            $signupData = [
                'fname'=> $fname,
                'lname'=> $lname,
                "username" => $username,
                "email"=> $email,
            ];
            
            $_SESSION['signup_data'] = $signupData;
            header("Location: ../signup_page.php?");
            die();
        }

        create_user($db, $fname, $lname, $username, $pwd, $email);
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