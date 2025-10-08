<?php
    require_once 'config_session.inc.php';
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
    </head>
    <body>
    <h2>User Profile</h2>
    <div>
        <p><strong>Name:</strong> <?php echo $_SESSION["user_username"]; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>>
    </div>

    <form action="Log-out.php" method="post">
        <input type="submit" value="Logout">
    </form>
    </body>
</html>
<?php
    } else { echo "User profile not found."; }
    $sql = null;
    $db = null;
?>