<?php
$host = "localhost";
$username = "root";
$password = null;
$database = "discuss";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("DB not connected" . $conn->connect_error);
}
