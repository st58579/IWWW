<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        $id = $_GET['idCartItem'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if(!isset($_SESSION['quantity'])){
            $_SESSION['quantity'] = array();
        }
        array_push($_SESSION['cart'], $id);
        header("Location: index.php?dir=page&page=product_details&id=$id");
    } else if($_GET['action'] == 'remove'){
        $id = $_GET['idCartItem'];
        unset($_SESSION['cart'][$id]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        header("Location: index.php?dir=page&page=cart");
    } else if($_GET['action'] == 'buy'){
        $productsIDArray = $_SESSION['cart'];
        print_r($productsIDArray);
        DBController::createNewOrder($_SESSION['user']['id'], date('Y-m-d H:i:s'), $productsIDArray);
        unset($_SESSION['cart']);
        header("Location: index.php?dir=page&page=cart");
    } else if($_GET['action'] == 'stringify'){
        if (isset($_SESSION['cart'])) {
            $products = array();
            foreach ($_SESSION["cart"] as $key => $val) {
                $prod = DBController::getProductsByIdForJson($val);
                array_push($products, $prod);
            }
            $_SESSION['json'] = json_encode($products);
            header("Location: index.php?dir=page&page=cart");
        }
    }
}
