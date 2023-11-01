<?php
include 'Unit2_database.php';

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
<?php include 'Unit2_header.php'; ?>

<body>
    <h2>Customers</h2>
    <table>
        <tr>
            <th>Customer #</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
        </tr>
        <?php if ($customers): ?>
            <?php foreach ($customers as $row): ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
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
    <p>Number of customers:
        <?= $numCustomers ?>
    </p>
    <p>Customer 2
        <?php $row = $customer2->fetch_row();
        if ($row) {
            echo "is " . $row[1] . " " . $row[2];
        } else {
            echo "does not exist";
        }
        ?>
    </p>
    <p>Customer 3
        <?php $row = $customer3->fetch_row();
        if ($row) {
            echo "is " . $row[1] . " " . $row[2];
        } else {
            echo "does not exist";
        }
        ?>
    </p>

    <p>Finding customer by email: mmouse@mines.edu... mmouse
        <?php $row = findCustomerByEmail($conn, "mmouse@mines.edu")->fetch_row();
        if ($row) {
            echo "is " . $row[1] . " " . $row[2];
        } else {
            echo "does not exist";
        }
        ?>
    </p>
    <p>Finding customer by email: dduck@mines.edu... dduck
        <?php $row = findCustomerByEmail($conn, "dduck@mines.edu")->fetch_row();
        if ($row) {
            echo "is " . $row[1] . " " . $row[2];
        } else {
            echo "does not exist";
        }
        ?>
    </p>
    <p>Adding new customer Donald Duck
        <?php addCustomer($conn, "Donald", "Duck", "dduck@mines.edu") ?>
    </p>
    <p>Finding customer by email: dduck@mines.edu...
        dduck
        <?php $row = findCustomerByEmail($conn, "dduck@mines.edu")->fetch_row();
        if ($row) {
            echo "is " . $row[1] . " " . $row[2];
        } else {
            echo "does not exist";
        }
        ?>
    </p>
    <p>Removing customer Donald Duck
        <?php deleteCustomerByEmail($conn, "dduck@mines.edu") ?>
    </p>



    <h2>Orders</h2>
    <?php displayOrders($orders, $conn) ?>

    <p>Adding an order</p>
    <?php addOrder($conn, 1, 2, 2, 15, 3, .12, time());
    displayOrders(getAllOrders($conn), $conn);
    ?>
    <p>Number of orders:
        <?= getNumberOfOrders($conn) ?>
    </p>
    <p>Removing order
        <?php removeProductByProductIdandCustomerId($conn, 1, 2) ?>
    </p>
    <?php include 'Unit2_footer.php'; ?>

    <h2>Books</h2>
    <table>
        <tr>
            <th>Book #</th>
            <th>Book</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php if ($books): ?>
            <?php foreach ($books as $row): ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
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
    <p>Selling 2 copies of A Court of Mist and Fury</p>
    <p>The new quantity for A Court of Mist and Fury is
        <?= sellBook($conn, 2, 2) ?>
    </p>
    <p>Selling 10 A Court of Mist and Fury</p>
    <p>The new quantity for A Court of Mist and Fury is
        <?= sellBook($conn, 2, 10) ?>
    </p>
    <p>Reset quantity of A Court of Mist and Fury to
        <?= sellBook($conn, 2, -3) ?>
    </P>
    <?php ?>
</body>