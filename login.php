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

    <div class="LoginFormParent">
        <form action="login_database.php" class="LoginForm" method="post">
            <label for="username">Username</label><br>
            <input type="text" placeholder="Username" name="username" required>
            <br>
            <label for="password">Password</label><br>
            <input type="password" placeholder="Password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>

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