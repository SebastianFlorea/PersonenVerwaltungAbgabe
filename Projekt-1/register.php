<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>

<?php
if (isset($_POST['submit'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once('resultDuplikat.php');

    require_once('statementDuplikat.php');
    if ($_POST['einverstaendnis'] != 1) {
        array_push($errors, "Not checked");
    }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, address, city, password, admin, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        //used to bind a parameter to the specified variable name in a sql statement for access the database record. The types "ss" is standing for two strings.
        $stmt->bind_param("sssssss", $firstname, $lastname, $address, $city, $hashPw, $admin, $username);
        $stmt->execute();
        $stmt->get_result();
        $stmt->close();
        //redirection to login.php
        header("Location: ./Login/login.php");
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
?>


<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-dark mt-5">
                <div class="card-title bg-primary text-white mt-5">
                    <h3 class="text-center py-3">Register CRUD</h3>
                </div>

                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert-light text-danger text-center my-3">
                        <?php if ($_GET['error'] == 'empty') { ?>
                            Please Fill in the Blanks
                        <?php } else { ?>
                            Please enter correct Username and Password
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="error-messages"
                ">
            </div>

            <div class="card-body">
                <form action="" id="form_login" method="post">
                    <input type="text" name="firstname" placeholder="Firstname" id="firstname_id"
                           class="form-control mb-3">
                    <input type="text" name="lastname" placeholder="Lastname" id="lastname_id"
                           class="form-control mb-3">
                    <input type="text" name="address" placeholder="Address" id="address_id" class="form-control mb-3">
                    <input type="text" name="city" placeholder="City" id="city_id" class="form-control mb-3">
                    <input type="text" name="username" id="username_id" placeholder="Username"
                           class="form-control mb-3">
                    <input type="password" name="password" id="password_id" placeholder="Password"
                           class="form-control mb-3">
                    <div class="row justify-content-center text-start mb-2">
                        <div class="col-9">
                            <label for="admin_id" class="text-white">Einverständnis - Daten werden veröffentlicht</label>
                        </div>
                        <div class="col-3">
                            <input type="checkbox" name="einverstaendnis" id="einverstaendnis_id" value="1" required>
                        </div>
                    </div>
                    <div class="row justify-content-start text-start">
                        <div class="col-12">
                            <input class="btn btn-warning" type="button" name="back" value="Back"
                                   onclick="location='Login/login.php'">
                            <input class="btn btn-success" type="submit" name="submit" value="Send it">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include_once('footer.php') ?>
</body>

</html>