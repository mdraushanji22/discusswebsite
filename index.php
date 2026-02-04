<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discuss Project</title>
</head>

<?php include("./client/commonFiles.php"); ?>

<body>
    <?php
    session_start();
    include("./client/header.php");

    // Check if user is NOT logged in
    $isLoggedIn = isset($_SESSION['user']) && isset($_SESSION['user']['username']);

    if (isset($_GET['signup']) && !$isLoggedIn) {
        include("./client/SignUp.php");
    } else if (isset($_GET['login']) && !$isLoggedIn) {

        include("./client/Login.php");
    } else {
        // Default page content
    }
    ?>

</body>

</html>