<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
}

$idOrder = $_GET['oid'];

DBController::confirmOrder($idOrder);

header('Location: index.php?dir=page&page=orders');
