<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

function getBy($att, $value, $array)
{
    foreach ($array as $key => $val) {
        if ($val[$att] === $value) {
            return $key;
        }
    }
    return null;
}

function getProduct($id)
{
    $conn = Connection::getConnectionInstance();
    $stmt = "SELECT * FROM products WHERE id = '$id'";
    $check_prod = mysqli_query($conn, $stmt);
    if (mysqli_num_rows($check_prod) > 0) {
        return mysqli_fetch_assoc($check_prod);
    }
}


?>
<?php
if(isset($_SESSION['cart'])) {
    echo '<section>';
    echo '<h2 style="text-align: center; margin: 20px">Shopping cart</h2>';
    echo '<div class="cart">';
    foreach ($_SESSION['cart'] as $id => $value) {
        $prod = getProduct($id);
        echo '<div class="cart-item">';
        echo '<img class="cart-img" src="' . $prod['img'] . '">';
        echo '<div class="cart-desc">';
        echo '<span class="cart-descblock">';
        echo '<div class="cart-name">' . $prod['name'] . '</div>';
        echo '<div class="cart-amount">' . $value['quantity'] . '</div>';
        echo '<div class="cart-cost">' . $prod['cost'] * $value['quantity'] . '</div>';
        echo '</span>';
        echo '<span class="cart-descblock">';
        echo '<div class="cart-bttn"><a href="index.php?dir=core&page=process_cart&action=add&cart=true&id=' . $prod["id"] . '">+</a></div>';
        echo '<div class="cart-bttn"><a href="index.php?dir=core&page=process_cart&action=remove&cart=true&id=' . $prod["id"] . '">-</a></div>';
        echo '<div class="cart-bttn"><a href="index.php?dir=core&page=process_cart&action=delete&cart=true&id=' . $prod["id"] . '">x</a></div>';
        echo '</span>';
        echo '</div>';

        echo '</div>';
    }
    echo '</div>';

    echo '</section>';
}
?>