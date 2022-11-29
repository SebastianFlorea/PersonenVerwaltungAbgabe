<?php
require_once('../config.php');
if (isset($_POST['Login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location: login.php?error=empty");
    } else {
        $query = "select * from users where username = ? and password = ?";
        $stmt = $conn->prepare($query);
        $hashPw = crypt($_POST['password'], '$6$rounds=5000$essollteetwasspannendessein$');
        $stmt->bind_param("ss", $_POST['username'], $hashPw);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['User'] = $result->fetch_assoc();


            header("location: ../index.php");
        } else {
            header("location: login.php?error=invalid");
        }


    }
} else {
    echo 'Not working now guys';
}


?>