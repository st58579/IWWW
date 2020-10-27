<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
include "navbar.php";
?>
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<div class="flexbox">
    <h1>Some about here</h1>
</div>