<?php


class AllOtherStuffController
{
    static function printRating($rating)
    {
        echo '<div class="rating">';
        for ($x = 1; $x <= 5; $x++) {
            if ($x <= $rating) {
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o" ></i>';
            }
        }
        echo '</div>';
    }

    static function printRatingHref($rating)
    {
        echo '<div class="rating">';
        for ($x = 1; $x <= 5; $x++) {
            if ($x <= $rating) {
                echo '<a href="./core/process_review.php?rating='.$x.'" class="fa fa-star"></a>';
            } else {
                echo '<a href="./core/process_review.php?rating='.$x.'" class="fa fa-star-o" ></a>';
            }
        }
        echo '</div>';
    }

    static function printRatingButton($rating)
    {
        echo '<div class="rating">';
        for ($x = 1; $x <= 5; $x++) {
            if ($x <= $rating) {
                echo '<button type="submit" class="fa fa-star"></button>';
            } else {
                echo '<button type="submit" id="'.$x.'" class="fa fa-star-o"></button>';
            }
        }
        echo '</div>';
    }

    static function printProductRaw($prod, $desc)
    {
        echo '<div class="small-container">';
        if ($desc != "none") {
            echo '<h2 class="title">' . $desc . '</h2>';
        }
        echo '<div class="row">
        <div class="col-4 product-clickable" onclick="location.href = `index.php?dir=page&page=product_details&id=' . $prod[1]['id'] . '`">
            <img src="' . $prod[1]["image"] . '" alt="product img">
            <h4 class="product-name">' . $prod[1]["name"] . '</h4>';

        AllOtherStuffController::printRating($prod[1]['rating']);

        echo '<p>' . $prod[1]['price'] . ',-</p>
        </div>
        <div class="col-4 product-clickable" onclick="location.href = `index.php?dir=page&page=product_details&id=' . $prod[2]['id'] . '`">
            <img src="' . $prod[2]["image"] . '" alt="product img">
            <h4 class="product-name">' . $prod[2]["name"] . '</h4>';

        AllOtherStuffController::printRating($prod[2]['rating']);

        echo '<p>' . $prod[2]['price'] . ',-</p>
        </div>
        <div class="col-4 product-clickable" onclick="location.href = `index.php?dir=page&page=product_details&id=' . $prod[3]['id'] . '`">
            <img src="' . $prod[3]["image"] . '" alt="product img">
            <h4 class="product-name">' . $prod[3]["name"] . '</h4>';

        AllOtherStuffController::printRating($prod[3]['rating']);

        echo '<p>' . $prod[3]['price'] . ',-</p>
        </div>
        <div class="col-4 product-clickable" onclick="location.href = `index.php?dir=page&page=product_details&id=' . $prod[4]['id'] . '`">
            <img src="' . $prod[4]["image"] . '" alt="product img">
            <h4 class="product-name">' . $prod[4]["name"] . '</h4>';

        AllOtherStuffController::printRating($prod[4]['rating']);

        echo '<p>' . $prod[4]['price'] . ',-</p>
        </div>
    </div>
</div>';

    }

    static function printTwoProductRaw($prod, $desc)
    {
        $prod1[1] = $prod[1];
        $prod1[2] = $prod[2];
        $prod1[3] = $prod[3];
        $prod1[4] = $prod[4];
        $prod2[1] = $prod[5];
        $prod2[2] = $prod[6];
        $prod2[3] = $prod[7];
        $prod2[4] = $prod[8];
        self::printProductRaw($prod1, $desc);
        self::printProductRaw($prod2, "none");
    }

    static function printThreeProductRaws($prod, $desc)
    {
        $prod1[1] = $prod[1];
        $prod1[2] = $prod[2];
        $prod1[3] = $prod[3];
        $prod1[4] = $prod[4];
        $prod2[1] = $prod[5];
        $prod2[2] = $prod[6];
        $prod2[3] = $prod[7];
        $prod2[4] = $prod[8];
        $prod3[1] = $prod[9];
        $prod3[2] = $prod[10];
        $prod3[3] = $prod[11];
        $prod3[4] = $prod[12];
        self::printProductRaw($prod1, $desc);
        self::printProductRaw($prod2, "none");
        self::printProductRaw($prod3, "none");
    }


}