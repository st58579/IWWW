<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$orders = DBController::getAllOrders();


    echo '<div class="small-container cart-page">';
if (isset($_SESSION['admin_msg'])) {
    echo ' <p class="msg" > ' . $_SESSION['admin_msg'] . ' </p > ';
    unset($_SESSION['admin_msg']);
}
    echo '<table>
        <tr>
            <th>Product</th>
            <th>User ID</th>
            <th>Confirm</th>
        </tr>';
    if (isset($orders)) {
        foreach ($orders as $num => $order) {
            echo '<tr class="cart-row">
            <input type="hidden" id="product-id-hidden" value="' . $order['idUser'] . '">
            <td>
                <div class="cart-info">
                    <img src="' . $order['image'] . '" class="cart-item-image">
                    <div>
                        <p class="cart-item-name">' . $order['name'] . '</p>
                        <span>Price: </span>
                        <span class="cart-item-price">' . $order['price'] . ',-</span>
                        <div>Time: ' . $order['time'] . '</div>
                        <div>Id order: ' . $order['idOrder'] . '</div>
                    </div>
                </div>
            </td>
            <td><p>User id: '.$order['idUser'].'</p></td>
            <td class="cart-row-subtotal"><a style="font-size: 18px" href="index.php?dir=core&page=confirm_order&oid='.$order['idOrder'].'&pid='.$order['idProduct'].'">Confirm</a></td>
        </tr>';
        }
        echo '</table>';
    }
    echo '</div>';

