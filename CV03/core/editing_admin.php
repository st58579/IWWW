<?php
session_start();
require_once "../core/connect.php";
include "../page/navbar.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$path = "uploads/" . time() . $_FILES['avatar']['name'];

$id = $_SESSION['editing']['id'];
unset($_SESSION['editing']['id']);

if (isset($connect)) {
    if (strlen($fullname) > 1) {
        $sql = "UPDATE users SET `full_name`='$fullname' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Edited successful";
        } else {
            $_SESSION['message'] = "Something went wrong.. (full name)";
            header('Location: ../page/edit_user.php');
        }
    }
    if (strlen($email) > 1) {
        $sql = "UPDATE users SET `email`='$email' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Edited successful";
        } else {
            $_SESSION['message'] = "Something went wrong.. (email)";
            header('Location: ../page/edit_user.php');
        }
    }
    if (strlen($path) > 19) { // 100% working
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Was not able to load avatar image.';
            header('Location: ../core/editing_admin.php');
        }
        $sql = "UPDATE users SET `avatar`='$path' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Edited successful";
            $_SESSION['user']['avatar'] = $path;
        } else {
            $_SESSION['message'] = "Something went wrong.. (avatar)";
            header('Location: ../page/edit_user.php');
        }
    }
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "Nothing changed";
    }
    header('Location: ../page/crud.php');
}