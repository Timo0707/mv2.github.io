<?php
$servername = "localhost";
$username = "root";
$password = "A5XDup=f>rNi3sn";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it does not exist
$databaseName = "verstappen";
$createDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";
$createTableAccounts = "CREATE TABLE IF NOT EXISTS `verstappen`.`accounts` (
    `email` TEXT NOT NULL , 
    `username` TEXT NOT NULL , 
    `password` TEXT NOT NULL , 
    `ID` INT NOT NULL AUTO_INCREMENT , 
    PRIMARY KEY (`ID`)) 
    ENGINE = InnoDB;";
$createTableAppointments = "CREATE TABLE IF NOT EXISTS `verstappen`.`appointments` (
    `first-name` TEXT NOT NULL , 
    `last-name` TEXT NOT NULL , 
    `time` INT NOT NULL , 
    `month` INT NOT NULL , 
    `day` INT NOT NULL , 
    `user-id` INT NOT NULL ) 
    ENGINE = InnoDB; ";

if ($conn->query($createDatabase) === TRUE) {
    echo "Database created successfully";
    header("Location:home.php");
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>