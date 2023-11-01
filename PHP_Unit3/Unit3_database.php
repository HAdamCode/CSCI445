<?php
include 'Unit3_database_credentials.php';

function getConnection()
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getAllCustomers($conn)
{
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);
    return $result;
}

function getNumberOfCustomers($conn)
{
    $sql = "SELECT COUNT(*) FROM customer";
    $result = $conn->query($sql);
    return $result->fetch_row()[0];
}

function findCustomerById($conn, $customerId)
{
    $sql = "SELECT * FROM customer WHERE id = $customerId";
    $result = $conn->query($sql);
    return $result;
}

function findCustomerByEmail($conn, $email)
{
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result;
}

function addCustomer($conn, $firstName, $lastName, $email)
{
    $sql = "INSERT INTO customer(first_name, last_name, email) VALUES ('$firstName', '$lastName', '$email')";
    $conn->query($sql);
}

function deleteCustomerByEmail($conn, $email)
{
    $sql = "DELETE FROM customer WHERE email = '$email'";
    $conn->query($sql);
}

function getAllOrders($conn)
{
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);
    return $result;
}

function findProductById($conn, $productId)
{
    $sql = "SELECT * FROM product WHERE id = $productId";
    $result = $conn->query($sql);
    return $result;
}

function addOrder($conn, $product_id, $customer_id, $quantity, $price, $tax, $donation, $timestamp)
{
    $sql = "INSERT INTO orders (product_id, customer_id, quantity, price, tax, donation, timestamp) VALUES ($product_id, $customer_id, $quantity, $price, $tax, $donation, $timestamp)";
    $conn->query($sql);
}

function removeProductByProductIdandCustomerId($conn, $product_id, $customer_id)
{
    $sql = "DELETE FROM orders WHERE customer_id = $customer_id and product_id = $product_id";
    $conn->query($sql);
}

function getNumberOfOrders($conn)
{
    $sql = "SELECT COUNT(*) FROM orders";
    $result = $conn->query($sql);
    return $result->fetch_row()[0];
}

function getAllBooks($conn)
{
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    return $result;
}

function sellBook($conn, $product_id, $quantity)
{
    $sql = "SELECT in_stock FROM product WHERE id = $product_id";
    $result = $conn->query($sql)->fetch_row()[0];
    $newStock = $result - $quantity;
    $newStock = $newStock < 0 ? 0 : $newStock;
    $sql = "UPDATE product SET in_stock = $newStock WHERE id = $product_id";
    $conn->query($sql);
    return $newStock;
}

function getOrderByCustomerProductTimestamp($conn, $product_id, $customer_id, $timestamp) {
    $sql = "SELECT COUNT(*) FROM orders WHERE product_id = $product_id AND customer_id = $customer_id AND timestamp = $timestamp";
    $result = $conn->query($sql);
    return $result;
}
?>