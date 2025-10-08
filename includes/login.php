<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'db.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';

        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors['empty_input'] = "Fill in All Field";
        }

        $result = get_user($db, $username);

        if (is_username_incorrect($result) || is_password_incorrect($pwd, $result["Pwd"])) {
            $errors['login_incorrect'] = "Incorrect Login Info";
        }

        require_once 'session.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors; 

            header("Location: ../login_page.php?");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["CustomerID"];
        session_id($sessionID);

        $_SESSION["CustomerID"] = $result["CustomerID"];
        $_SESSION["Name"] = $result["First_Name"];
        $_SESSION["Email"] = $result["Email"];
        $_SESSION["Username"] = htmlspecialchars($result["Username"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../homepage.php?=login=success");
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