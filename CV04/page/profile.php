<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

<body>
<div class="flexbox">
    <div class="profile-content">
        <div class="row" style="height: 150px">
            <img class="avatar-img" src="../<?= $_SESSION['user']['avatar'] ?>" alt="">
        </div>
        <div class="row">
            <div class="column"><h2>Name:</div>
            <div class="column"><h2><?= $_SESSION['user']['full_name'] ?></h2></div>
        </div>
        <div class="row">
            <div class="column"><h2>Login:</h2></div>
            <div class="column"><h2><?= $_SESSION['user']['login'] ?></h2></div>
        </div>
        <div class="row">
            <div class="column"><h2>Email:</h2></div>
            <div class="column"><h2><?= $_SESSION['user']['email'] ?></h2></div>
        </div>
        <div class="row">
            <div class="column"><h2>Role:</h2></div>
            <div class="column"><h2><?= $_SESSION['user']['role'] ?></h2></div>
        </div>
        <div class="row">
            <div class="column"><a href="index.php?dir=core&page=logout">logout</a></div>
            <div class="column"><a href="index.php?dir=page&page=edit_profile">edit profile</a></div>
        </div>
    </div>
</div>
</body>
