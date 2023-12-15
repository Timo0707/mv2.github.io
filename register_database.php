<?php
$servername = "localhost";
$username = "root";
$password = "A5XDup=f>rNi3sn";
$dbname = "verstappen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials
    $checkUsername = "SELECT * FROM accounts WHERE username = '$username'";
    $usernameResult = $conn->query($checkUsername);
    $checkEmail = "SELECT * FROM accounts WHERE email = '$email'";
    $emailResult = $conn->query($checkEmail);

    if ($emailResult->num_rows > 0) {
        echo "Email already exists";
        echo"<br><a href='register.php'>Return to login page</a>";
    } else if ($usernameResult->num_rows > 0) {
        echo "Username already exists";
        echo"<br><a href='register.php'>Return to register page</a>";
    } else {
        $addAccount = $conn->query("INSERT INTO accounts (email, username, password, ID)
        VALUES ('$email', '$username', '$password', NULL)");
        
        header("Location:login.php");
    }
}

$conn->close();
?>
