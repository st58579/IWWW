<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

function addToCart($id)
{
    if (isset($_SESSION['cart'])) {
        if (!array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['quantity'] = 1;
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }
    } else {
        $_SESSION['cart'][$id]['quantity'] = 1;
        print_r($_SESSION['cart']);
    }
}

function removeFromCart($id)
{
    if (array_key_exists($id, $_SESSION['cart'])) {
        if ($_SESSION['cart'][$id]['quantity'] == 1) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity']--;
        }
    }
}

function deleteFromCart($id)
{
    if (array_key_exists($id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$id]);
    }
}

if ($_GET['action'] == 'add') {
    addToCart($_GET['id']);
}

if ($_GET['action'] == 'remove') {
    removeFromCart($_GET['id']);
}

if ($_GET['action'] == 'delete') {
    deleteFromCart($_GET['id']);
}
if($_GET['cart'] == true) {
    header("Location: index.php?dir=page&page=cart");
} else {
    header("Location: index.php?dir=page&page=shop");
}