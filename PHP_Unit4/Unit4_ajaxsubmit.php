<?php
include 'Unit4_database.php';
$conn = getConnection(); 
$firstName2 = $_POST['firstName1'];
$lastName2 = $_POST['lastName1'];
$email2 = $_POST['email1'];
$productId2 = $_POST['productID1'];
$quantity2 = $_POST['quantity1'];
$timestamp2 = $_POST['timestamp1'];

$customer = findCustomerByEmail($conn, $email2)->fetch_row();

if (!$customer) {
    addCustomer($conn, $firstName2, $lastName2, $email2);
    $customer = findCustomerByEmail($conn, $email2)->fetch_row();
    echo "<p>Thank you, $firstName2, for choosing us as your books provider!</p>";
} else {
    echo "<p>Welcome back, $firstName2 $lastName2!</p>";
}

$customerId = $customer[0];
$product = findProductById($conn, $productId2)->fetch_row();
$price = $product[3];
$subtotal = $quantity2 * $price;
$taxRate = 0.08;
$tax = $subtotal * $taxRate;
$total = $subtotal + $tax;

$existingOrder = getOrderByCustomerProductTimestamp($conn, $customerId, $productId2, $timestamp2)->fetch_row()[0];

if ($existingOrder == 0) {
    addOrder($conn, $productId2, $customerId, $quantity2, $price, $tax, 'false', $timestamp2);
    sellBook($conn, $productId2, $quantity2);
}
echo "Order submitted for: " . $firstName2 . " " . $lastName2 . " " . $quantity2 . " " . $product[1] . " Total $" . number_format($total, 2);
?>