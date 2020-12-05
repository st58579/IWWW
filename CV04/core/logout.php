<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
unset($_SESSION['user']);
unset($_SESSION['cart']);

header('Location: index.php');