<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body>
    <div class="TopBar">
        <a class="TopButton" href="home.php">Home</a>
        <a class="TopButton" href="boeken.php">Boeken</a>
        <a class="TopButton" href="help.php">Help</a>
        <button class="MenuButton" onclick="OpenMenu()">☰</button>
    </div>

    <h1>Appointments</h1>
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

        if (!isset($_SESSION["user_id"])) {
            header("Location: login.php");
            exit();
        }

        $user_id = $_SESSION["user_id"];
        $sql1 = "SELECT * FROM appointments WHERE `user-id` = '$user_id'";
        $result1 = $conn->query($sql1);

        if ($_SESSION["user_id"] != 1) {
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo "<div class='appointmentDiv'>";
                    echo "<p>First Name: " . $row["first-name"] . "</p>";
                    echo "<p>Last Name: " . $row["last-name"] . "</p>";
                    echo "<p>Time: " . $row["time"] . "</p>";
                    echo "<p>Month: " . $row["month"] . "</p>";
                    echo "<p>Day: " . $row["day"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No appointments found for the user.";
            }
        } else {
            $sql = "SELECT * FROM appointments";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<div class='appointmentDiv'>";
                echo "<p>First Name: " . $row["first-name"] . "</p>";
                echo "<p>Last Name: " . $row["last-name"] . "</p>";
                echo "<p>Time: " . $row["time"] . "</p>";
                echo "<p>Month: " . $row["month"] . "</p>";
                echo "<p>Day: " . $row["day"] . "</p>";
                echo "</div>";
            }
        }
        $conn->close();
    ?>

    <div id="SideMenu" class="Menu">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="account.php">Account</a>
    </div>
</body>
<script>
    let isOpen = false
    function OpenMenu() {
        if (isOpen == false) {
            document.getElementById('SideMenu').style.display = "block";
            isOpen = true
        } else if (isOpen == true) {
            document.getElementById('SideMenu').style.display = "none";
            isOpen = false
        }
    }
</script>
</html>