<!DOCTYPE html>
<html lang="en">
<?php include_once('../header.php') ?>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-dark mt-5">
                <div class="card-title bg-primary text-white mt-5">
                    <h3 class="text-center py-3">Login CRUD</h3>
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
                <form action="processLogin.php" id="form_login" method="post">
                    <input type="text" name="username" placeholder="Username" class="form-control mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control mb-3">
                    <input class="btn btn-warning" type="button" name="back" value="Register"
                           onclick="location='../register.php'">
                    <input class="btn btn-success" name="Login" type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include_once('../footer.php') ?>
</body>

</html>


