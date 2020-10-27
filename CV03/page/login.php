<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
include "navbar.php";
?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<div class="form-content">
    <form action="../core/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button class="submit-button" type="submit">Login</button>
        <p class="ref"><a href="register.php">New to us? Get started!</a></p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
    </form>
</div>
</body>
