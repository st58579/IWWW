<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_dev";

// Create connection
$connect = new mysqli($servername, $username, $password, $db);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
