<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
$fullname = $_POST['fullname'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$connect = Connection::getConnectionInstance();

if (strlen("$login") < 5) {
    $_SESSION['message'] = 'Login can not be less than 5 symbols';
    header('Location: index.php?dir=page&page=register');
} else if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'")) > 0) {
    $_SESSION['message'] = 'User with login ' . $login . ' is already exists';
    header('Location: index.php?dir=page&page=register');
} else if (strlen("$password") < 6) {
    $_SESSION['message'] = 'Password can not be less than 6 symbols';
    header('Location: index.php?dir=page&page=register');

} else if ($password === $password_confirm) {
    $path = "uploads/" . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Was not able to load avatar image.';
        header('Location: index.php?dir=page&page=register');
    }
    $password = md5($_POST['password']);
    $password_confirm = md5($_POST['password_confirm']);
    if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users")) > 0) {
        $role = 'user';
    } else {
        $role = 'admin';
    }
    $sql = "INSERT INTO users (full_name, login, email, avatar_path, password, role)
        VALUES ('$fullname', '$login', '$email', '$path', '$password', '$role')";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Registered successful";
        header('Location: index.php?dir=page&page=login');
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else {
    $_SESSION['message'] = 'Password is not confirmed';
    header('Location: index.php?dir=page&page=register');
}
