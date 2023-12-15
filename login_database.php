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
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM accounts WHERE (username = '$username' OR email = '$username') AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $_SESSION["user_id"] = $row["ID"];
        header("Location:account.php");
    } else {
        header("Location:login.php");
    }
}

$conn->close();
?>