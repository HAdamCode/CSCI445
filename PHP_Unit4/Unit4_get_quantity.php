<?php
include 'Unit4_database.php';
$conn = getConnection();
$productId = $_GET["productId"];
$count = getNumberOfBooks($conn, $productId);
echo $count;
?>