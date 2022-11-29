<?php
require_once('config.php');
if ($_SESSION['User']['admin']) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
header("Location: index.php");

?>