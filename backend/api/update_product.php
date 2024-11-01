<?php
include_once '../config/database.php';
include_once '../models/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->id) &&
    isset($data->name) &&
    isset($data->category) &&
    isset($data->description) &&
    isset($data->price) &&
    isset($data->imageUrl) &&
    isset($data->inStock)
) {
    $product->id = $data->id;
    $product->name = $data->name;
    $product->category = $data->category;
    $product->description = $data->description;
    $product->price = $data->price;
    $product->imageUrl = $data->imageUrl;
    $product->inStock = $data->inStock;

    if ($product->update()) {
        echo json_encode(array("message" => "Product was updated."));
    } else {
        echo json_encode(array("message" => "Unable to update product."));
    }
} else {
    echo json_encode(array("message" => "Incomplete data."));
}
?>
