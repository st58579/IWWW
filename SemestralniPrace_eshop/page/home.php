<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>Explore the possibilities of <br>modern technology with TestShop</h1>
                <p>The world is constantly changing. The world of technology especially. Change with him.</p>
                <a href="index.php?dir=page&page=products&sorting=default&pageNum=1" class="btn">Explore now &#8594</a>
            </div>
            <div class="col-2">
                <img src="./images/many_gadgets.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!---------- categories ---------->

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="./images/category-phones.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./images/category-tablets.png" alt="">
            </div>
            <div class="col-3">
                <img src="./images/category-watch.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!---------- Featured products ---------->


<?php
$prod = DBController::getProductByRating(4, 0);
AllOtherStuffController::printProductRaw($prod, "Featured products");

?>

<!---------- Latest products ---------->

<?php
$prod2 = DBController::getLatestProducts(8, 0);
AllOtherStuffController::printTwoProductRaw($prod2,"Latest products");
?>

<!---------- Exclusive offer ---------->
<?php
$prod = DBController::getExclusiveProducts(1);

echo '<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="'. $prod[1]['image'] .'" alt="exclusive product image">
            </div>
            <div class="col-2">
                <h2>Exclusively available on TestShop</h2>
                <h1>'. $prod[1]['name'] .'</h1>
                <small>'. $prod[1]['description'] .'</small>
                <a href="index.php?dir=page&page=products&sorting=default&pageNum=1" class="btn">Buy now &#8594</a>
            </div>
        </div>
    </div>
</div>';
?>
<!---------- Customers review ---------->

<div class="review">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum dolor sit amet. Vel quos voluptatem eos quasi consequatur
                    qui sint atque qui quidem beatae ea excepturi quibusdam vel aliquid
                    quos ut nihil labore. Et fuga consectetur est quod doloremque ut quos</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="./images/qm.png" alt="users profile img">
                <h3>Users name</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum dolor sit amet. Vel quos voluptatem eos quasi consequatur
                    qui sint atque qui quidem beatae ea excepturi quibusdam vel aliquid
                    quos ut nihil labore. Et fuga consectetur est quod doloremque ut quos</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="./images/qm.png" alt="users profile img">
                <h3>Users name</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum dolor sit amet. Vel quos voluptatem eos quasi consequatur
                    qui sint atque qui quidem beatae ea excepturi quibusdam vel aliquid
                    quos ut nihil labore. Et fuga consectetur est quod doloremque ut quos</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="./images/qm.png" alt="users profile img">
                <h3>Users name</h3>
            </div>
        </div>
    </div>
</div>