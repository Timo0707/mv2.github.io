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
        <a class="CurrentSelected">Boeken</a>
        <a class="TopButton" href="help.php">Help</a>
        <button class="MenuButton" onclick="OpenMenu()">☰</button>
    </div>

    <div class="mainPurchase" >
        <form action="appointment_database.php" method="post" >
            <label for="first-name">First name</label><br>
            <input type="text" name="first-name" placeholder="First name" required><br>

            <label for="last-name">Last name</label><br>
            <input type="text" name="last-name" placeholder="Last name" required><br>

            <label for="time">Time</label><br>
            <select name="time" required>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
            </select><br>

            <label for="month">month</label><br>
            <select name="month" required>
                <option value="1">January</option>
                <option value="2">Febuary</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select><br>

            <label for="day">day</label><br>
            <select name="day" required>
                <?php for ($i = 1; $i <= 30; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>

            <br><br>
            <button type="submit">Set date</button>
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