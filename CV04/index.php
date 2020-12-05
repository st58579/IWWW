<?php
session_start();
require_once "classes/Connection.php";
require_once "classes/CartController.php";

?>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/main.css">
    </head>

<?php
include "page/navbar.php";
if (isset($_GET['dir']) && isset($_GET['page'])) {
    $dir = $_GET["dir"];
    $pathToFile = $dir . "/" . $_GET["page"] . ".php";
    if (file_exists($pathToFile)) {
        include $pathToFile;
    } else {
        include "page/login.php";
    }
} else {
    include "page/login.php";
}

