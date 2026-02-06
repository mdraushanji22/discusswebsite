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
    } else if (isset($_GET['ask'])) {

        include("./client/ask.php");
    } else if (isset($_GET['q-id'])) {
        $qid = $_GET['q-id'];
        include("./client/question-details.php");
    } else if (isset($_GET['c-id'])) {
        $cid = $_GET['c-id'];
        include("./client/questions.php");
    } else if (isset($_GET['u-id'])) {
        $uid = $_GET['u-id'];
        include("./client/questions.php");
    } else if (isset($_GET['latest'])) {
        include("./client/questions.php");
    } else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        include("./client/questions.php");
    } else {
        include("./client/questions.php");
    }
    ?>

</body>

</html>