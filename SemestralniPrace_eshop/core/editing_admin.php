<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
}

$firstName = $_POST['firstName'];
$secondName = $_POST['secondName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$path = "uploads/" . time() . $_FILES['avatar']['name'];

$id = $_SESSION['editing']['id'];
unset($_SESSION['editing']['id']);

$connect = Connection::getConnectionInstance();
if (strlen($firstName) > 1) {
    $sql = "UPDATE eshop.user SET `firstName`='$firstName' WHERE `idUser`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
    } else {
        $_SESSION['message'] = "Something went wrong.. (full name)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}
if (strlen($secondName) > 1) {
    $sql = "UPDATE eshop.user SET `secondName`='$secondName' WHERE `idUser`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
    } else {
        $_SESSION['message'] = "Something went wrong.. (full name)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}
if (strlen($email) > 1) {
    $sql = "UPDATE users SET `email`='$email' WHERE `id`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
    } else {
        $_SESSION['message'] = "Something went wrong.. (email)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}
if (strlen($phone) > 11) {
    $sql = "UPDATE eshop.user SET `phone`='$phone' WHERE `idUser`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
    } else {
        $_SESSION['message'] = "Something went wrong.. (phone)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}
if (strlen($city) > 1) {
    $sql = "UPDATE eshop.user SET `city`='$city' WHERE `idUser`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
    } else {
        $_SESSION['message'] = "Something went wrong.. (city)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}

if (strlen($path) > 19) {
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Was not able to load avatar image.';
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
    $sql = "UPDATE eshop.user SET `image`='$path' WHERE `idUser`='$id'";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['message'] = "Edited successful";
        $_SESSION['user']['avatar'] = $path;
        header('Location: index.php?dir=page&page=crud');
    } else {
        $_SESSION['message'] = "Something went wrong.. (avatar)";
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
}
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = "Nothing changed";
}
header('Location: index.php?dir=page&page=crud');
