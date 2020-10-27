<?php
session_start();
require_once "connect.php";


$login = $_POST['login'];
$password = md5($_POST['password']);

if (isset($connect)) {
    $stmt = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $check_user = mysqli_query($connect, $stmt);
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user["id"],
            "full_name" => $user["full_name"],
            "login" => $user["login"],
            "avatar" => $user["avatar"],
            "email" => $user["email"],
            "role" => $user["role"]
        ];
        header("Location: ../page/profile.php");
    } else {
        $_SESSION['message'] = "Wrong login or password.";
        header("Location: ../page/login.php");
    }
}

?>

