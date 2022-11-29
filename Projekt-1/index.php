<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>

<body>
<div class="container mt-5">
    <?php
    require_once('./config.php');

    if (isset($_SESSION['User'])) {
        ?>
        <h1 class="text-center">
            Welcome <?php echo htmlspecialchars($_SESSION['User']['firstname']) . ' ' . htmlspecialchars($_SESSION['User']['lastname']) ?>
        </h1>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-center">
            <form method="post" action="Login/logout.php">
                <input type="hidden" name="action" value="logout">
                <input type="submit" class="btn btn-primary" value="Logout">
            </form>
        </div>
        <br>
        <h4 class="text-center">Overview over the people management system</h4>
        <br>
        <?php
    } else {
        header("location:Login/login.php");
    }

    $result = $conn->query("SELECT * FROM users");
    ?>
    <?php if ($_SESSION['User']['admin']) { ?>
        <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="new.php">Create new person</a>
        </div>
    <?php } ?>
    <?php if ($result->num_rows > 0) { ?>
        <div class="tableContainer justify-content-center overflow-auto">
            <table class="table">
                <thead class="sticky-top">
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Adresse</th>
                    <th>City</th>
                    <th>Username</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr class="tableInformations">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo htmlspecialchars($row['firstname']) ?></td>
                        <td><?php echo htmlspecialchars($row['lastname']) ?></td>
                        <?php if ($_SESSION['User']['admin'] || $row['id'] == $_SESSION['User']['id']) { ?>
                            <td><?php echo htmlspecialchars($row['address']) ?></td>
                            <td><?php echo htmlspecialchars($row['city']) ?></td>
                            <td><?php echo htmlspecialchars($row['username']) ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                                <?php if ($_SESSION['User']['admin']) { ?>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                <?php } ?>
                            </td>
                        <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <span>No Users found</span>
    <?php } ?>
</div>


<?php include_once('footer.php') ?>
</body>

</html>