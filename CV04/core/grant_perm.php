<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
$id = $_GET['userid'];
$connect = Connection::getConnectionInstance();
$sql = "UPDATE users SET `role`='admin' WHERE `id`='$id'";
mysqli_query($connect, $sql);
$_SESSION['message'] = "Permission granted";
header("Location: index.php?dir=page&page=crud");
