<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
$connect = Connection::getConnectionInstance();

$login = $_POST['login'];
$password = md5($_POST['password']);
if(preg_match("/^[a-z0-9]/i", $login)) {
    $stmt = "SELECT * FROM eshop.user WHERE login = '$login'";
    $check_user = mysqli_query($connect, $stmt);
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        if ($password == $user['password']) {
            $_SESSION['user'] = [
                "id" => $user["idUser"],
                "role" => $user["role"],
                "login" => $user["login"],
                "firstname" => $user["firstName"],
                "surname" => $user["secondName"],
                "email" => $user["email"],
                "city" => $user["city"],
                "phone" => $user["phone"],
                "avatar" => $user["image"]
            ];
            header("Location: index.php?dir=page&page=profile");
        } else {
            $_SESSION['message'] = "Wrong password.";
            header("Location: index.php?dir=page&page=login");
        }
    } else {
        $_SESSION['message'] = "User with this login does not exist.";
        header("Location: index.php?dir=page&page=login");
    }
} else {
    $_SESSION['message'] = "Login can contains only letters and numbers.";
    header("Location: index.php?dir=page&page=login");
}


