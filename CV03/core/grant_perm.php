<?php
session_start();
require_once "connect.php";

$id = $_GET['userid'];
if(isset($connect)){
    $sql = "UPDATE users SET `role`='admin' WHERE `id`='$id'";
    mysqli_query($connect, $sql);
    $_SESSION['message'] = "Permission granted";
    header("Location: ../page/crud.php");
}