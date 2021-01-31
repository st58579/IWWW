<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
}
$id = $_GET['userid'];
$connect = Connection::getConnectionInstance();
$sql = "UPDATE eshop.user SET `role`='admin' WHERE `idUser`='$id'";
mysqli_query($connect, $sql);
$_SESSION['message'] = "Permission granted";
header("Location: index.php?dir=page&page=crud");
