<?php

session_start();
unset($_SESSION['is_logged_in']);

?>

<h1>You Have Successfully Logged Out</h1>
<a href="login.php">Login Again</a>