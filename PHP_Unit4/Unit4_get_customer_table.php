<?php
include 'Unit4_database.php';
$conn = getConnection();

$input = $_GET['input'];
$searchBy = $_GET['searchBy'];

$result = getCustomersBySearch($conn, $input, $searchBy);

if ($result) {
    echo "<table id='table'>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No matching customers found.";
}

mysqli_close($conn);
?>
