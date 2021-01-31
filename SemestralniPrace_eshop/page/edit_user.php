<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$id = $_GET['userid'];
$connect = Connection::getConnectionInstance();
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM eshop.user WHERE idUser = '$id'"));


echo "<div class='form-content'>";
echo "<form action='index.php?dir=core&page=editing_admin' method='post' enctype='multipart/form-data'>";
echo "<label>Edit user's name (" . $user['firstName'] . ")</label>";
echo "<input type='text' name='firstName' placeholder='new name'>";
echo "<label>Edit user's surname (" . $user['secondName'] . ")</label>";
echo "<input type='text' name='secondName' placeholder='new surname'>";
echo "<label>Edit user's email (" . $user['email'] . ")</label>";
echo "<input type='email' name='email' placeholder='dont forget about @'>";
echo "<label>Edit user's phone (" . $user['phone'] . ")</label>";
echo "<input type='text' name='phone' placeholder='dont forget about @'>";
echo "<label>Edit user's city (" . $user['city'] . ")</label>";
echo "<input type='text' name='city' placeholder='dont forget about @'>";
echo "<label>Edit user's avatar.</label>";
echo "<input type='file' name='avatar'>";
echo "<button type='submit'>Submit changes</button>";
if (isset($_SESSION['message'])) {
    echo ' <p class="msg" > ' . $_SESSION['message'] . ' </p > ';
    unset($_SESSION['message']);
}

echo "</form>";
echo "</div>";

