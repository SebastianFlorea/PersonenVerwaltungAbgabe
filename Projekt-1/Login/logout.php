<?php
session_start();

if ($_SESSION['User'] && $_POST['action'] == 'logout') {
    session_destroy();
}
header("Location: login.php");
?>
