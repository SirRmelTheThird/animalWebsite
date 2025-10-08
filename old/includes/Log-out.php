<?php
require_once 'config_session.inc.php';
session_unset();
?><script>alert("You been logout");</script><?php
header('Location: ../homepage.php?');  
?>