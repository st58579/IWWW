<?php
session_start();
require_once "classes/Connection.php";
require_once "classes/DBController.php";
require_once "classes/AllOtherStuffController.php";
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<?php
include "page/navbar.php";
if (isset($_GET['dir']) && isset($_GET['page']) && preg_match("/^[a-z0-9-_\.]+$/", $_GET['page'])
    && preg_match("/^[a-z0-9-_\.]+$/", $_GET['dir'])) {
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
include "page/footer.php";

