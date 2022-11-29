<?php
require_once('config.php');
if (!$_SESSION['User']['admin']) {
    header("Location: index.php");
} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>

<body>
<h3 class="text-center">Add new Person</h3>
<?php
if (isset($_POST['submit'])) {
    require_once('resultDuplikat.php');

    require_once('statementDuplikat.php');

    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, address, city, password, admin, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        //used to bind a parameter to the specified variable name in a sql statement for access the database record. The types "ss" is standing for two strings.
        $stmt->bind_param("sssssss", $firstname, $lastname, $address, $city, $hashPw, $admin, $username);
        $stmt->execute();
        $stmt->get_result();
        $stmt->close();
        //redirection to index.php
        header("Location: index.php");
    }
} else {
    $firstname = "";
    $lastname = "";
    $address = "";
    $city = "";
    $password = "";
    $admin = '0';
    $username = '';
}
require('_form.php');
?>

<?php include_once('footer.php') ?>
</body>

</html>