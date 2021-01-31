<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

<div class="small-container">
    <div class="row row-2">
        <h2>All products</h2>
        <select class="sorting-selector" onchange="changeSorting(this.value)">
            <option value="default">Default sorting</option>
            <option value="price">Sort by price</option>
            <option value="rating">Sort by rating</option>
            <option value="date">Sort by date</option>
        </select>
    </div>

    <!---------products----->

    <?php
    $sorting = $_GET['sorting'];
    $offset = ($_GET['pageNum'] - 1) * 12;
    $prod = DBController::getAllProductsByName($offset);
    switch ($sorting) {
        case "default":
            break;
        case "price":
            $prod = DBController::getAllProductsByPrice($offset);
            break;
        case "rating":
            $prod = DBController::getProductByRating(12, $offset);
            break;
        case "date":
            $prod = DBController::getLatestProducts(12, $offset);
            break;
    }
    AllOtherStuffController::printThreeProductRaws($prod, "none");

    $countProds = DBController::getAllProductsId()[1]['id'];

    // <!-------pages buttons-->
    $nextPage = $_GET['pageNum'] + 1;
    echo '<div class="page-btn">';
    for ($i = 1; $i <= $countProds / 12; $i++) {
        echo '<span><a href="index.php?dir=page&page=products&sorting=default&pageNum=' . $i . '">' . $i . '</a></span>';
    }
    if ($countProds > 23) {
        echo '<span><a href="index.php?dir=page&page=products&sorting=default&pageNum=' . $nextPage . '">&#8594</a></span>';
    }
    echo '</div>';

    ?>
    <!-------foooter------->

</div>

<script>
    function changeSorting(val) {
        switch (val) {
            case "default":
                window.location.replace("index.php?dir=page&page=products&sorting=default&pageNum=1");
                break;
            case "price":
                window.location.replace("index.php?dir=page&page=products&sorting=price&pageNum=1");
                break;
            case "rating":
                window.location.replace("index.php?dir=page&page=products&sorting=rating&pageNum=1");
                break;
            case "date":
                window.location.replace("index.php?dir=page&page=products&sorting=date&pageNum=1");
                break;
            case "sale":
                window.location.replace("index.php?dir=page&page=products&sorting=sale&pageNum=1");
                break;
        }
    }
</script>