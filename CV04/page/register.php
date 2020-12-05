<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php?dir=page&page=profile');
}
?>
<body>
<div class="form-content">
    <form action="index.php?dir=core&page=signup" method="post" enctype="multipart/form-data">
        <label>Hello, </label>
        <input type="text" name="fullname" placeholder="full name">
        <label>In the depths of the net they call you*</label>
        <input type="text" name="login" placeholder="Login">
        <label>Leave me contacts </label>
        <input type="email" name="email" placeholder="email@email.cz">
        <label>Secret code known only to the keeper*</label>
        <input type="password" name="password" placeholder="password">
        <label>And again.. Boring*</label>
        <input type="password" name="password_confirm" placeholder="confirm password">
        <label>Your bright face, please.</label>
        <input type="file" name="avatar">
        <button type="submit">Register</button>
        <p class="ref">
            <a href="index.php?dir=page&page=login">Have an account? Sign up!</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
    </form>
</div>
</body>