<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require_once "../core/connect.php";
include "navbar.php";

$id = $_GET['userid'];
$_SESSION['editing']['id'] = $id;
if (isset($connect)) {
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'"));
}

echo "<div class='form-content'>";
echo "<form action='../core/editing_admin.php' method='post' enctype='multipart/form-data'>";
echo "<label>Edit user's full name (" . $user['full_name'] . ")</label>";
echo "<input type='text' name='fullname' placeholder='new name'>";
echo "<label>Edit user's contacts (" . $user['email'] . " )</label>";
echo "<input type='email' name='email' placeholder='dont forget about @'>";
echo "<label>Edit user's avatar.</label>";
echo "<input type='file' name='avatar'>";
echo "<button type='submit'>Submit changes</button>";
if (isset($_SESSION['message'])) {
    echo ' < p class="msg" > ' . $_SESSION['message'] . ' </p > ';
    unset($_SESSION['message']);
}

echo "</form>";
echo "</div>";

?>

