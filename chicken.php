<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$type = $conn->real_escape_string($data->type);
$quantity = (int)$data->quantity;
$date = $conn->real_escape_string($data->date);

$sql = "INSERT INTO poultry (type, quantity, date_added) VALUES ('$type', $quantity, '$date')";
$conn->query($sql);
echo json_encode(["message" => "Poultry record added"]);
?>