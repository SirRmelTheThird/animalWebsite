<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors['empty_input'] = "Fill in All Field";
        }

        $result = get_user($db, $username);

        if (is_username_incorrect($result) || is_password_incorrect($pwd, $result["password"])) {
            $errors['login_incorrect'] = "Incorrect Login Info";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors; 

            header("Location: ../log.php?");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["id"];
        session_id($sessionID);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        // header("Location: ../index.php?login=success");
        header("Location: ../homepage.php?");
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