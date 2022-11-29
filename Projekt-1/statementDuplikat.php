<?php
$query = "select * from users where username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    array_push($errors, 'Username is already taken');
}
$stmt->close();