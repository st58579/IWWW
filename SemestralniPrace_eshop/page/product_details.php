<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

<head>
    <script src="./JS/product_details.js" async></script>
</head>

<?php

$prod = DBController::getSingleProductById($_GET['id']);
$reviews = DBController::getAllProductsReview($_GET['id'], 3);
echo '<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="' . $prod['image'] . '" width="100%" id="product-img">

            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="./images/category-watch.jpg" alt="" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="./images/category-tablets.png" alt="" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="./images/category-watch.jpg" alt="" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="' . $prod['image'] . '" alt="" class="small-img">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Category: ' . $prod['nameCategory'] . '</p>
            <h1>' . $prod['name'] . '</h1>
            <h4>' . $prod['price'] . ',-</h4>
            <a href="index.php?dir=core&page=process_cart&idCartItem=' . $_GET['id'] . '&action=add" class="btn">Add to cart</a>
            <h3>Product Details</h3>
            <p>' . $prod['description'] . '</p>
        </div>
    </div>
</div>
<br>
<div class="small-container centered">
<div class="row">
    <div class="col-2 review-col">
        <form action="index.php?dir=core&page=process_review" method="post">
            <h2>Leave a review for this product</h2>
            <input id="hidden-review-rating" type="hidden" name="rating" value="1">
            <input id="hidden-review-product-id" type="hidden" name="item-id" value="' . $_GET['id'] . '">
            <div class="row leave-review">';
AllOtherStuffController::printRating(0);
echo '      </div>
            <div class="row">
                <textarea name="user-review" id="" cols="50" rows="10"></textarea>
            </div>
            <button class="submit-button" type="submit">Send</button>
        </form>
    </div>
    <div class="col-2 review-col">
    <h2>Last reviews</h2>';
for ($i = 0; $i < sizeof($reviews); $i++) {
    echo '<div class="row">';
    AllOtherStuffController::printRating($reviews[$i + 1]['rating']);
    echo '</div>';
    echo '<div class="row">' . $reviews[$i + 1]['description'] . '</div>';
}

echo '</div>
</div>
</div>

<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <a href="index.php?dir=page&page=products&sorting=default&pageNum=1" id="view-more">View more</a>
    </div>
</div>';
?>
<!---------related products-------->


<?php
$prod = DBController::getProductByRating(4, 0);
AllOtherStuffController::printProductRaw($prod, "none");
?>
