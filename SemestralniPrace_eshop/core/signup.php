<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$firstName = $_POST['firstName'];
$surname = $_POST['surname'];
$city = $_POST['city'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$connect = Connection::getConnectionInstance();
if(preg_match("/^[a-z0-9]/i", $login) && preg_match("/^[a-z0-9]/i", $password)) {
    if (strlen("$login") < 5) {
        $_SESSION['message'] = 'Login can not be less than 5 symbols';
        header('Location: index.php?dir=page&page=register');
    } else if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM eshop.user WHERE login = '$login'")) > 0) {
        $_SESSION['message'] = 'User with login ' . $login . ' is already exists';
        header('Location: index.php?dir=page&page=register');
    } else if (strlen("$password") < 6) {
        $_SESSION['message'] = 'Password can not be less than 6 symbols';
        header('Location: index.php?dir=page&page=register');
    } else if ($password === $password_confirm) {
        $path = "uploads/" . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], './' . $path)) {
            $_SESSION['message'] = 'Was not able to load avatar image.';
            header('Location: index.php?dir=page&page=register');
        }
        $password = md5($_POST['password']);
        $password_confirm = md5($_POST['password_confirm']);
        if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM eshop.user")) > 0) {
            $role = 'user';
        } else {
            $role = 'admin';
        }
        $sql = "INSERT INTO eshop.user (login,password, firstName, secondName, city, email, phone,  image, role)
        VALUES ('$login','$password', '$firstName', '$surname', '$city', '$email', '$phone', '$path', '$role')";
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
} else {
    $_SESSION['message'] = 'Login can contains only letters and numbers.';
    header('Location: index.php?dir=page&page=register');
}