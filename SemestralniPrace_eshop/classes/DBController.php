<?php


class DBController
{

    static function getProductById($id): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT * FROM eshop.product WHERE idProduct = '$id'";
        $check_prod = mysqli_query($conn, $stmt);
        if (mysqli_num_rows($check_prod) > 0) {
            return mysqli_fetch_assoc($check_prod);
        }
    }

    static function getAllProductsId(): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT idProduct FROM eshop.product ORDER BY idProduct DESC";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $number++;
        }
        return $result;
    }

    static function getProductsByIdForJson($id)
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT name, price, brand, color, date FROM eshop.product WHERE idProduct = '$id'";
        $check_prod = mysqli_query($conn, $stmt);
        if (mysqli_num_rows($check_prod) > 0) {
            return mysqli_fetch_assoc($check_prod);
        }
    }

    static function getSingleProductById($id): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price,
        r.rating, date, c.nameCategory FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview JOIN eshop.product_has_category phc
        on pr.idProduct = phc.Product_idProduct JOIN eshop.category c on c.idCategory = phc.Category_idCategory
        WHERE idProduct = $id";
        $check_prod = mysqli_query($conn, $stmt);
        if (mysqli_num_rows($check_prod) > 0) {
            return mysqli_fetch_assoc($check_prod);
        }
    }

    static function getAllProductsByRating(): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview ORDER BY rating";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getAllProductsByName($offset): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview GROUP BY name ORDER BY name LIMIT 1000 OFFSET $offset";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getAllProductsByDate(): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN eshop.review r on r.idReview = phr.Review_idReview ORDER BY date";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getAllProductsByPrice($offset): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview GROUP BY name, price ORDER BY price  LIMIT 1000 OFFSET $offset";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getProductByRating($amount, $offset): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview GROUP BY name, rating ORDER BY rating DESC LIMIT $amount OFFSET $offset";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getLatestProducts($amount, $offset): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price, 
        r.rating, date FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview GROUP BY name, date ORDER BY date DESC LIMIT $amount OFFSET $offset";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $result[$number]['date'] = $row['date'];
            $number++;
        }
        return $result;
    }

    static function getExclusiveProducts($amount): array
    {
        $conn = Connection::getConnectionInstance();
        $stmt = "SELECT pr.idProduct, pr.name, pr.image, pr.brand, pr.color, pr.description, pr.price,
        r.rating, date FROM eshop.product pr JOIN eshop.product_has_review phr on pr.idProduct = phr.Product_idProduct
        JOIN  eshop.review r on r.idReview = phr.Review_idReview JOIN eshop.product_has_category phc
on pr.idProduct = phc.Product_idProduct JOIN eshop.category c on c.idCategory = phc.Category_idCategory WHERE idCategory = 4 ORDER BY RAND() LIMIT $amount";
        $check_prods = mysqli_query($conn, $stmt);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_prods)) {
            $result[$number]['id'] = $row['idProduct'];
            $result[$number]['name'] = $row['name'];
            $result[$number]['price'] = $row['price'];
            $result[$number]['brand'] = $row['brand'];
            $result[$number]['color'] = $row['color'];
            $result[$number]['description'] = $row['description'];
            $result[$number]['image'] = $row['image'];
            $result[$number]['rating'] = $row['rating'];
            $result[$number]['date'] = $row['date'];
            $number++;
        }
        return $result;
    }

    static function getReview($userId, $productId)
    {
        $conn = Connection::getConnectionInstance();
        $sql = "select er.description, er.rating from eshop.review er join eshop.product_has_review phr on er.idReview 
                = phr.Review_idReview where User_idUser = $userId && Product_idProduct = $productId";
        $check_review = mysqli_query($conn, $sql);
        if ($check_review) {
            return mysqli_fetch_assoc($check_review);
        } else {
            return null;
        }
    }

    static function getAllProductsReview($productId, $limit)
    {
        $conn = Connection::getConnectionInstance();
        $sql = "select er.description, er.rating from eshop.review er join eshop.product_has_review phr on er.idReview 
                = phr.Review_idReview where Product_idProduct = $productId ORDER BY rating LIMIT $limit";
        $check_review = mysqli_query($conn, $sql);
        $result = array();
        $number = 1;
        while ($row = mysqli_fetch_assoc($check_review)) {
            $result[$number]['description'] = $row['description'];
            $result[$number]['rating'] = $row['rating'];
            $number++;
        }
        return $result;
    }

    static function getReviewId($userId)
    {
        $conn = Connection::getConnectionInstance();
        $sql = "select idReview from eshop.review er where User_idUser = $userId order by idReview desc limit 1";
        $check_review = mysqli_query($conn, $sql);
        if (mysqli_num_rows($check_review) > 0) {
            return mysqli_fetch_assoc($check_review)['idReview'];
        } else {
            return null;
        }
    }

    static function getLastOrderId($userId)
    {
        $conn = Connection::getConnectionInstance();
        $sql = "select idOrder from eshop.order where User_idUser = $userId order by idOrder desc limit 1";
        $check_review = mysqli_query($conn, $sql);
        if (mysqli_num_rows($check_review) > 0) {
            return mysqli_fetch_assoc($check_review)['idOrder'];
        } else {
            return null;
        }
    }


    static function postReview($rating, $description, $userId, $productId)
    {
        $conn = Connection::getConnectionInstance();
        if (self::getReview($userId, $productId) == null) {
            $sql = "insert into eshop.review (rating, description, User_idUser) values 
            ('$rating', '$description', '$userId')";
            if ($conn->query($sql) === TRUE) {
                $id = self::getReviewId($userId);
                $sql2 = "insert into eshop.product_has_review (Product_idProduct, Review_idReview) values 
                          ('$productId', '$id')";
                $conn->query($sql2);
            }
        } else {
            echo "<script type='text/javascript'>alert('You have already rated this product');</script>";
        }
    }

    static function createNewOrder($idUser, $time, $productsIDArray)
    {
        $conn = Connection::getConnectionInstance();

        $sql = "insert into eshop.order (time, User_idUser) VALUES ( '$time', '$idUser')";
        if ($conn->query($sql) === true) {
            $idOrder = self::getLastOrderId($idUser);
            foreach ($productsIDArray as $val) {
                $prod = self::getProductById($val);
                $price = $prod['price'];
                $sql2 = "insert into eshop.`order_has_product` (Order_idOrder, Product_idProduct, price) VALUES ('$idOrder', '$val', '$price')";
                $conn->query($sql2);
            }
        }
    }

    static function getAllOrders()
    {
        $conn = Connection::getConnectionInstance();

        $sql = "select idOrder, time, User_idUser, p.name, p.image, ohp.price, p.color, p.brand, isConfirmed, idProduct from eshop.`order` o
                                  join eshop.order_has_product ohp on o.idOrder = ohp.Order_idOrder
                                  join eshop.product p on ohp.Product_idProduct = p.idProduct ORDER BY time";
        $check_orders = mysqli_query($conn, $sql);
        $result = array();
        $number = 0;
        while ($row = mysqli_fetch_assoc($check_orders)) {
            if ($row['isConfirmed'] == 0) {
                $result[$number]['idOrder'] = $row['idOrder'];
                $result[$number]['time'] = $row['time'];
                $result[$number]['idUser'] = $row['User_idUser'];
                $result[$number]['idProduct'] = $row['idProduct'];
                $result[$number]['name'] = $row['name'];
                $result[$number]['image'] = $row['image'];
                $result[$number]['price'] = $row['price'];
                $result[$number]['color'] = $row['color'];
                $result[$number]['brand'] = $row['brand'];
                $number++;
            }
        }
        return $result;
    }

    static function confirmOrder($idOrder){
        $conn = Connection::getConnectionInstance();

        $sql = "update eshop.`order` set isConfirmed = 1 where idOrder = $idOrder";
        if ($conn->query($sql) === true) {
            $_SESSION['admin_msg'] = "order has been confirmed";
        }
    }
}