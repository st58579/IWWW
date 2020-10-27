<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
include "navbar.php";
?>



<head>
    <meta charset="UTF-8">
    <title>Editing profile</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="form-content">
    <form action="../core/editing.php" method="post" enctype="multipart/form-data">
        <label>Hello, </label>
        <input type="text" name="fullname" placeholder="new name">
        <label>Edit your contacts </label>
        <input type="email" name="email" placeholder="don't forget about @">
        <label>Your <b>old</b> secret code* (required to confirm changes)</label>
        <input type="password" name="password" placeholder="password">
        <label>Secret code known only to the keeper</label>
        <input type="password" name="password_new" placeholder="new password">
        <label>And again.. Boring</label>
        <input type="password" name="password_new_confirm" placeholder="confirm new password">
        <label>Your bright face again, please.</label>
        <input type="file" name="avatar">
        <button type="submit">Submit changes</button>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
    </form>
</div>
</body>