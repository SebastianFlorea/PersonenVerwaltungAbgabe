<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$password = $_POST['password'];
$admin = isset($_POST['admin']) ? $_POST['admin'] : 0;
$username = $_POST['username'];
$hashPw = crypt($password, '$6$rounds=5000$essollteetwasspannendessein$');

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);


$errors = [];
if (empty($firstname)) {
    array_push($errors, 'Firstname is empty');
}
if (empty($lastname)) {
    array_push($errors, 'Lastname is empty');
}
if (empty($address)) {
    array_push($errors, 'Address is empty');
}
if (empty($city)) {
    array_push($errors, 'City is empty');
}
if (empty($password)) {
    array_push($errors, 'Password is empty');
}
if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    array_push($errors, 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
}
if (empty($username)) {
    array_push($errors, 'Username is empty');
}

