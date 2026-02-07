<?php
session_start();
include("../common/db.php");
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("Insert into `users`
    (`id`,`username`,`email`,`password`,`address`)
    values(NULL, '$username','$email','$password','$address')
    ");
    $result = $user->execute();
    $user->insert_id;
    if ($result) {
        $_SESSION['user'] = ['username' => $username, 'email' => $email, 'user_id' => $user->insert_id];
        header("location: /discusswebsite");
    } else {
        echo "user already exist";
    }
} else if ((isset($_POST['login']))) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;
    $query = "select * from users where email = '$email' and password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {

        foreach ($result as $row) {

            $username = $row['username'];
            $user_id = $row['id'];
        }
        $_SESSION['user'] = ['username' => $username, 'email' => $email, 'user_id' => $user_id];

        header("location: /discusswebsite");
    } else {
        echo "Email or password invalid";
    }
} else if ((isset($_GET['logout']))) {

    session_unset();

    header("location: /discusswebsite");
} else if (isset($_POST['ask'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $question = $conn->prepare("INSERT INTO questions (title, description, category_id, user_id) VALUES (?, ?, ?, ?)");
    $question->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($question->execute()) {
        header("Location: /discusswebsite");
        exit;
    } else {
        echo "Question could not be added";
    }
} else if (isset($_POST['answer'])) {;

    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    // Correct query (only 3 placeholders)
    $answers = $conn->prepare("INSERT INTO answers (answer, question_id, user_id) VALUES (?, ?, ?)");

    // Correct binding (1 string + 2 integers)
    $answers->bind_param("sii", $answer, $question_id, $user_id);

    if ($answers->execute()) {
        header("Location: /discusswebsite?q-id=$question_id");
        exit;
    } else {
        echo "Answer could not be added";
    }
} else if (isset($_GET['delete'])) {
    $qid = $_GET['delete'];
    $query = $conn->prepare("delete from questions where id=$qid");
    $result = $query->execute();
    if ($result) {

        header("Location: /discusswebsite");
    }
}
