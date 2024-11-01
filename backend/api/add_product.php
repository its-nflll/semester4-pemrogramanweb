<?php
include_once '../config/database.php';
include_once '../models/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->name = $data->name;
$product->category = $data->category;
$product->description = $data->description;
$product->price = $data->price;
$product->imageUrl = $data->imageUrl;
$product->inStock = $data->inStock;

if($product->create()) {
    echo json_encode(array("message" => "Product was created."));
} else {
    echo json_encode(array("message" => "Unable to create product."));
}
?>
