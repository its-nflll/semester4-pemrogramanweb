<?php
include_once '../config/database.php';
include_once '../models/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $product->readOne();
$num = $stmt->rowCount();

if($num > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
    $product_item = array(
        "id" => $id,
        "name" => $name,
        "category" => $category,
        "description" => $description,
        "price" => $price,
        "imageUrl" => $imageUrl,
        "inStock" => $inStock
    );
    echo json_encode($product_item);
} else {
    echo json_encode(array("message" => "Product not found."));
}
?>
