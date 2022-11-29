<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>
<body>
<div class="container mt-2" id="test">

    <?php if (isset($errors)) { ?>

        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as &$error) { ?>
                    <li><?php echo $error ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <div class="error-messages"></div>

    <form method="POST" id="form">
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="firstname_id">Firstname</label>
            </div>
            <div class="col-2">
                <input type="text" name="firstname" id="firstname_id" value="<?php echo $firstname ?>">
            </div>
        </div>
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="lastname_id">Lastname</label>
            </div>
            <div class="col-2">
                <input type="text" name="lastname" id="lastname_id" value="<?php echo $lastname ?>">
            </div>
        </div>
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="address_id">Address</label>
            </div>
            <div class="col-2">
                <input type="text" name="address" id="address_id" value="<?php echo $address ?>">
            </div>
        </div>
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="city_id">City</label>
            </div>
            <div class="col-2">
                <input type="text" name="city" id="city_id" value="<?php echo $city ?>">
            </div>
        </div>
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="password_id">Password</label>
            </div>
            <div class="col-2">
                <input type="password" name="password" id="password_id" value="<?php echo $password ?>">
            </div>
        </div>
        <div class="row justify-content-center text-start mb-2">
            <div class="col-1">
                <label for="username_id">Username</label>
            </div>
            <div class="col-2">
                <input type="text" name="username" id="username_id" value="<?php echo $username ?>">
            </div>
        </div>
        <?php if ($_SESSION['User']['admin'] || $row['id'] == $_SESSION['User']['id']) { ?>
            <div class="row justify-content-center text-start mb-2">
                <div class="col-1">
                    <label for="admin_id">Admin</label>
                </div>
                <div class="col-2">
                    <input type="checkbox" name="admin" id="admin_id" value="1" <?php if ($admin == "1") {
                        echo "checked";
                    } ?>>
                </div>
            </div>
        <?php } ?>
        <div class="row justify-content-center text-start">
            <div class="col-2 offset-md-1">
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
                <input class="btn btn-warning" type="button" name="back" value="Back" onclick="location='index.php'">
                <input class="btn btn-success" type="submit" name="submit" value="Send it">
            </div>
        </div>
    </form>
</div>


<?php include_once('footer.php') ?>
</body>
</html>