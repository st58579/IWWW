<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
$connect = Connection::getConnectionInstance();

$login = $_POST['login'];
$password = md5($_POST['password']);

$stmt = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$check_user = mysqli_query($connect, $stmt);
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user["id"],
        "full_name" => $user["full_name"],
        "login" => $user["login"],
        "avatar_path" => $user["avatar_path"],
        "email" => $user["email"],
        "role" => $user["role"]
    ];
    header("Location: index.php?dir=page&page=profile");
} else {
    $_SESSION['message'] = "Wrong login or password.";
    header("Location: index.php?dir=page&page=login");
}


