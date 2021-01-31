<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
?>

<body>
<div class="form-content">
    <form action="index.php?dir=core&page=signin" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button class="submit-button" type="submit">Login</button>
        <p class="ref"><a href="index.php?dir=page&page=register">New to us? Get started!</a></p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
    </form>
</div>
</body>