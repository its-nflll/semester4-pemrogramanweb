<?php
include_once '../config/database.php';
include_once '../models/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->id = $data->id;

if($product->delete()) {
    echo json_encode(array("message" => "Product was deleted."));
} else {
    echo json_encode(array("message" => "Unable to delete product."));
}
?>
