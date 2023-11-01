<?php include("Unit3_header.php"); ?>
<?php
include 'Unit3_database.php';

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$productID = $_POST['product'];
$quantity = $_POST['quantity'];
$donation = $_POST['donation'];
$timestamp = $_POST['timestamp'];
if ($donation == 'yes') {
    $donation = true;
} else {
    $donation = false;
}

$conn = getConnection();

$customer = findCustomerByEmail($conn, $email)->fetch_row();

if (!$customer) {
    addCustomer($conn, $firstName, $lastName, $email);
    $customer = findCustomerByEmail($conn, $email)->fetch_row();
    echo "<p>Thank you, $firstName, for choosing us as your books provider!</p>";
} else {
    echo "<p>Welcome back, $firstName $lastName!</p>";
}

$customerId = $customer[0];
$product = findProductById($conn, $productID)->fetch_row();
$price = $product[3];
$subtotal = $quantity * $price;
$taxRate = 0.08;
$tax = $subtotal * $taxRate;
$total = $subtotal + $tax;

$existingOrder = getOrderByCustomerProductTimestamp($conn, $customerId, $productID, $timestamp)->fetch_row()[0];

if ($existingOrder == 0) {
    addOrder($conn, $productID, $customerId, $quantity, $price, $tax, $donation, $timestamp);
    sellBook($conn, $productID, $quantity);
}


?>
<html>

<head>
    <link rel="stylesheet" href="Unit3_common.css">
    <link rel="stylesheet" href="Unit3_process_order.css">
</head>

<body>

    <div class="receipt">
        <h2>Order Confirmation</h2>
        <?php
        ?>
        <p><strong>Email:</strong>
            <?php echo $email; ?>
        </p>
        <p><strong>Product:</strong>
            <?php echo $product[1]; ?>
        </p>
        <p><strong>Quantity:</strong>
            <?php echo $quantity; ?>
        </p>
        <p><strong>Price:</strong> $
            <?php echo number_format($price, 2); ?>
        </p>
        <p><strong>Subtotal:</strong> $
            <?php echo number_format($subtotal, 2); ?>
        </p>
        <p><strong>Tax (8%):</strong> $
            <?php echo number_format($tax, 2); ?>
        </p>
        <p><strong>Total:</strong> $
            <?php echo number_format($total, 2); ?>
        </p>
    </div>
    <?php include("Unit3_footer.php"); ?>
</body>

</html>