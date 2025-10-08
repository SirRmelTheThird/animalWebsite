<?php
require_once 'session.php';
session_unset();
?><script>alert("You been logout");</script><?php
header('Refresh: 1; url=../homepage.php');
?>