<head>
    <meta charset="UTF-8">
    <title>Personenverwaltung</title>

    <?php
    // if path is a subpath of Login
    echo "<link rel='stylesheet' href='" .
        (str_contains($_SERVER['PHP_SELF'], 'Login') ? '..' : '.') .
        "/styles.css'>";
    ?>

    <?php
    // if (true) {
    //     echo "hallo";
    // } else {
    //     echo "test";
    // }

    // echo true ? "hallo" : "test";
    require_once 'config.php';
    ?>
</head>