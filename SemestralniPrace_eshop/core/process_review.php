<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
$rating = $_POST['rating'];
$description = $_POST['user-review'];
$userId = $_SESSION['user']['id'];
$productId = $_POST['item-id'];

DBController::postReview($rating, $description, $userId, $productId);

header("Location: index.php?dir=page&page=product_details&id=$productId");

