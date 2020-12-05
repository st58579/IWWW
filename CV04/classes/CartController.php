<?php


class CartController
{
    function getAllItems(): array{
        $connect = Connection::getConnectionInstance();
        $stmt = "SELECT * FROM products";
        $products = mysqli_fetch_assoc(mysqli_query($connect, $stmt));
        print_r($products);
    }

}