<div class="container">
    <h1 class="heading">Questions</h1>

    <?php
    include("./common/db.php");
    $query = "select * from questions";
    $result = $conn->query($query);

    foreach ($result as $row) {
        $title = $row['title'];
        echo "<div class ='row question-list'>
        <h4>$title</h4></div>";
    }
    ?>

</div>