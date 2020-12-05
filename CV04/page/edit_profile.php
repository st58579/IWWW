<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

<body>
<div class="form-content">
    <form action="index.php?dir=core&page=update_user_profile" method="post" enctype="multipart/form-data">
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