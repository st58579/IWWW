<?php
echo '<body>';

$connect = Connection::getConnectionInstance();
$stmt = "SELECT * FROM products";
$products = mysqli_query($connect, $stmt);

echo '<div class="catalog">';

while ($row = mysqli_fetch_array($products)) {
    echo '<div class="catalog-item">';
    echo '<img class="catalog-img" src="' . $row['img'] . '">';
    echo '<div class="catalog-desc">' . $row['name'] . '</div>';
    echo '<div class="catalog-desc">' . $row['cost'] . '</div>';
    echo '<div class="catalog-desc"><a href="index.php?dir=core&page=process_cart&action=add&id=' . $row["id"] . '">BUY</a></div>';
    echo '</div>';
}

echo '</div>';
echo '</body>';
