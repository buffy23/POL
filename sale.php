<?php
require 'db.php';
$sql = "SELECT * FROM poultry ORDER BY id DESC";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>