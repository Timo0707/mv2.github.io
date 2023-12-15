<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "A5XDup=f>rNi3sn";
$dbname = "verstappen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $time = $_POST["time"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $id = $_SESSION["user_id"];
    
    $sql = "INSERT INTO appointments (`first-name`, `last-name`, `time`, `month`, `day`, `user-id`)
    VALUES ('$firstName', '$lastName', '$time', '$month', '$day', '$id')";    
    $result = $conn->query($sql);

    if ($result) {
        header("Location:account.php");
    } else {
        header("Location:login.php");
    }
}

$conn->close();
?>