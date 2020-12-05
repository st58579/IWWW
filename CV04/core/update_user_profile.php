<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$id = $_SESSION['user']['id'];
$login = $_SESSION['user']['login'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$password_new = $_POST['password_new'];
$password_new_confirm = $_POST['password_new_confirm'];

$connect = Connection::getConnectionInstance();
$sql = "SELECT * FROM users WHERE id = '$id' AND password = '$password'";
$check_user = mysqli_query($connect, $sql);
if (mysqli_num_rows($check_user) > 0) {
    print_r($check_user);
    if (strlen("$fullname") > 0) {
        $sql = "UPDATE users SET `full_name`='$fullname' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Email changed";
            $_SESSION['user']['full_name'] = $fullname;
        }
    }
    if (strlen("$email") > 0) {
        $sql = "UPDATE users SET `email`='$email' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Email changed";
            $_SESSION['user']['email'] = $email;
        }
    }
    $path = "uploads/" . time() . $_FILES['avatar']['name'];
    if (strlen("$path") > 19) {
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Was not able to load avatar image.';
            header('Location: index.php?dir=page&page=edit_profile');
        }
        $sql = "UPDATE users SET `avatar_path`='$path' WHERE `id`='$id'";
        if ($connect->query($sql) === TRUE) {
            $_SESSION['message'] = "Avatar changed";
            $_SESSION['user']['avatar'] = $path;
        }
    }
    if (strlen("$password_new") > 6) {
        if ($password_new === $password_new_confirm) {
            $password_enc = md5($password_new);
            $sql = "UPDATE users SET `password`='$password_enc' WHERE `id`='$id'";
            if ($connect->query($sql) === TRUE) {
                $_SESSION['message'] = "Password changed";
                header('Location: index.php?dir=page&page=edit_profile');
            }
        } else {
            $_SESSION['message'] = "Passwords do not match";
            header('Location: index.php?dir=page&page=edit_profile');
        }
    } else {
        $_SESSION['message'] = 'Password can not be less than 6 symbols.';
        header('Location: index.php?dir=page&page=edit_profile');
    }
} else {
    $_SESSION['message'] = 'Wrong password';
    header('Location: index.php?dir=page&page=edit_profile');
}

