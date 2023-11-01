<?php
include 'Unit4_database.php';

date_default_timezone_set("America/Denver");
$conn = getConnection();
$customers = getAllCustomers($conn);
$numCustomers = getNumberOfCustomers($conn);
$customer2 = findCustomerById($conn, 2);
$customer3 = findCustomerById($conn, 3);
$orders = getAllOrders($conn);
$books = getAllBooks($conn);

function displayOrders($orders, $conn)
{
    if ($orders->num_rows == 0) {
        echo "<p>No orders yet</p>";
    } else {
        echo "<table>";
        echo "<tr>
                <th>Customer</th>
                <th>Puzzle</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Donation</th>
                <th>Total</th>
                </tr>";

        foreach ($orders as $order) {
            $customer = findCustomerById($conn, $order['customer_id'])->fetch_row();
            $name = $customer[1] . " " . $customer[2];
            $product = findProductById($conn, $order['product_id'])->fetch_row();
            $total = $order['quantity'] * $order['price'] + $order['tax'] + $order['donation'];
            echo "<tr>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $product[1] . "</td>";
            echo "<td>" . date("m/d/y h:i A", $order['timestamp']) . "</td>";
            echo "<td>" . $order['quantity'] . "</td>";
            echo "<td>" . $order['price'] . "</td>";
            echo "<td>" . $order['tax'] . "</td>";
            echo "<td>" . $order['donation'] . "</td>";
            echo "<td>" . $total . "</td>";

            echo "</tr>";
        }

        echo "</table>";
    }
}
?>
<?php include 'Unit4_header.php'; ?>

<body>
    <h2>Customers</h2>
    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
        </tr>
        <?php if ($customers): ?>
            <?php foreach ($customers as $row): ?>
                <tr>
                    <td>
                        <?= $row['last_name'] ?>
                    </td>
                    <td>
                        <?= $row['first_name'] ?>
                    </td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>

    <h2>Orders</h2>
    <?php displayOrders($orders, $conn) ?>
    <p>Number of orders:
        <?= getNumberOfOrders($conn) ?>
    </p>

    <h2>Books</h2>
    <table>
        <tr>
            <th>Book</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php if ($books): ?>
            <?php foreach ($books as $row): ?>
                <tr>
                    <td>
                        <?= $row['product_name'] ?>
                    </td>
                    <td>
                        <?= $row['in_stock'] ?>
                    </td>
                    <td>
                        <?= $row['price'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
    <?php ?>
    <?php include 'Unit4_footer.php'; ?>

</body>