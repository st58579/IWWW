<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

    <head>
        <script src="./JS/cart.js" async></script>
    </head>
<?php
if (isset($_SESSION['cart'])) {
    $products = array();
    foreach ($_SESSION["cart"] as $key => $val) {
        $prod = DBController::getProductById($val);
        array_push($products, $prod);
    }
    $quantities = $_SESSION['quantity'];
}

echo '<div class="small-container cart-page">';
if (isset($_SESSION['json'])) {
    echo ' <p class="msg" > ' . $_SESSION['json'] . ' </p > ';
    unset($_SESSION['json']);
}
echo '<table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>';
if (isset($products)) {
    foreach ($products as $key => $val) {
        echo '<tr class="cart-row">
            <input type="hidden" id="product-id-hidden" value="' . $val['idProduct'] . '">
            <td>
                <div class="cart-info">
                    <img src="' . $val['image'] . '" class="cart-item-image">
                    <div>
                        <p class="cart-item-name">' . $val['name'] . '</p>
                        <span>Price: </span>
                        <div class="cart-item-price">' . $val['price'] . ',-</div>
                        <a href="index.php?dir=core&page=process_cart&idCartItem=' . $key . '&action=remove" class="cart-remove-button">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" min="1" value="1" class="cart-quantity-input"></td>
            <td class="cart-row-subtotal">,-</td>
        </tr>';
    }
    echo '</table>';
}
echo '<div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td class="cart-total-price-nt">___-___</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td class="cart-tax">___-___</td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="cart-total-price">___-___</td>
            </tr>
        </table>
    </div>
</div>';

if (isset($products)) {

    echo '<div class="small-container">
    <div class="row">
        <div class="col-2" style="text-align: center">
            <form action="index.php?dir=core&page=process_cart&action=stringify" method="post">
            <button type="submit" class="btn">Export cart to JSON</button>
            </form>
        </div>
        <div class="col-2" style="text-align: center">
            <a href="index.php?dir=core&page=process_cart&action=buy" onclick="alert(`Thank for your purchase! Your order has been saved!`)"
               class="btn">Buy products</a>
        </div>
    </div>
</div>';
}
?>