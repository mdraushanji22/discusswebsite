<!DOCTYPE html>
<html lang="en">

<head>
    <title>Disscuss Project</title>
</head>
<?php include("./client/commonFiles.php"); ?>

<body>
    <?php
    session_start();
    include("./client/header.php");
    if (isset($_GET['signup'])) {
        include("./client/SignUp.php");
    } else if (isset($_GET['login'])) {

        include("./client/Login.php");
    } else {
        //
    }

    ?>

</body>

</html>