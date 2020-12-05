<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$path = "uploads/" . time() . $_FILES['avatar']['name'];

$id = $_SESSION['editing']['id'];
unset($_SESSION['editing']['id']);

$connect = Connection::getConnectionInstance();
if (strlen($fullname) > 1) {
    $sql = "UPDATE users SET `full_name`='$fullname' WHERE `id`='$id'";
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
if (strlen($path) > 19) {
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Was not able to load avatar image.';
        header('Location: index.php?dir=page&page=edit_user&userid='.$id);
    }
    $sql = "UPDATE users SET `avatar_path`='$path' WHERE `id`='$id'";
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
