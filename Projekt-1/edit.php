<?php
require_once('config.php');
$id = $_GET['id'];
if (!(isset($_SESSION['User']) && ($_SESSION['User']['admin'] || $id == $_SESSION['User']['id']))) {
    header("Location: index.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>

<body>
<h3 class="text-center">Edit your Person</h3>
<?php
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result) {
    $user = $result->fetch_assoc();
    //isset checks whether the variable is set - it has to be declared and is not null
    if (isset($_POST['submit'])) {
        require_once('resultDuplikat.php');

        if ($username != $user['username']) {
            require_once('statementDuplikat.php');
        }
        if (count($errors) == 0) {
            //used to prepare an SQL statement for execution
            $stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, address = ?, city = ?, password = ?, admin = ?, username = ? WHERE id = $id");
            //used to bind a parameter to the specified variable name in a sql statement for access the database record. The types "ss" is standing for two strings
            $stmt->bind_param("sssssss", $firstname, $lastname, $address, $city, $hashPw, $admin, $username);
            $stmt->execute();
            $stmt->close();
            //redirection to index.php
            header("Location: index.php");
        }
    } else {
        //pulling records from the database
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $address = $user['address'];
        $city = $user['city'];
        $admin = $user['admin'];
        $username = $user['username'];
    }
    require('_form.php');
} else {
    header("Location: index.php");
}
?>

<?php include_once('footer.php') ?>
</body>

</html>