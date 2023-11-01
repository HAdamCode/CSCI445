<?php include("Unit1_header.php");
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$donation = $_POST['donation'];
$price = 10.00;
$taxRate = 0.08;
$subTotal = $quantity * $price;
$tax = $subTotal * $taxRate;
$totalTax = $subTotal + $tax;

if ($donation == "yes") {
    $total = ceil($totalTax);
} else {
    $total = $totalTax;
}
?>
<main>
    <h2>Order Confirmation</h2>
    <p><strong>First Name:</strong>
        <?php echo $firstName; ?>
    </p>
    <p><strong>Last Name:</strong>
        <?php echo $lastName; ?>
    </p>
    <p><strong>Email:</strong>
        <?php echo $email; ?>
    </p>
    <p><strong>Quantity:</strong>
        <?php echo $quantity; ?>
    </p>
    <p><strong>Product:</strong>
        <?php echo $product; ?>
    </p>
    <p><strong>Price:</strong>
        <?php echo $price; ?>
    </p>
    <p><strong>Subtotal:</strong> $
        <?php echo number_format($subTotal, 2); ?>
    </p>
    <p><strong>Tax (8%):</strong> $
        <?php echo number_format($tax, 2); ?>
    </p>
    <p><strong>Total With Tax (8%):</strong> $
        <?php echo number_format($totalTax, 2); ?>
    </p>
    <p><strong>Total:</strong> $
        <?php echo number_format($total, 2); ?>
    </p>
</main>
<?php include("Unit1_footer.php"); ?>