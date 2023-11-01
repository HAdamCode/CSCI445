<body>
    <?php include("Unit4_header.php"); ?>
    <?php 
    include 'Unit4_database.php';
    $conn = getConnection();
    date_default_timezone_set("America/Denver");
    $products = getAllBooks($conn)?>
    <main>
        <div id="content-container">
            <div id="left-content">
                <h2>Welcome to Our Store</h2>

                <form action="Unit3_process_order.php" method="post">
                    <fieldset>
                    <input type="hidden" name="timestamp" value="<?php echo time(); ?>">
                        <legend>Personal Information</legend>
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required pattern="[A-Za-z\s']{1,}"
                            title="Only letters, spaces, and apostrophes are allowed"><br>

                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required pattern="[A-Za-z\s']{1,}"
                            title="Only letters, spaces, and apostrophes are allowed"><br>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required type="email"><br>
                    </fieldset>

                    <fieldset>
                        <legend>Product Info</legend>
                        <select id="product" name="product" required>
                        <option disabled selected value="" data-image="" data-quantity=""> -- select a book --</option>
                        <?php
                        foreach ($products as $product) {
                            $productId = $product['id'];
                            $productName = $product['product_name'];
                            $price = $product['price'];
                            $imageUrl = $product['image_name'];
                            $inStock = $product['in_stock'];
                            $displayText = "$productName - $$price";

                            echo "<option value=\"$productId\" data-image=\"$imageUrl\" data-quantity=\"$inStock\">$displayText</option>";
                        }
                        ?>
                        </select><br>

                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required min="1" max="100"><br>

                    </fieldset>

                    <fieldset>
                        <legend>Donation</legend>
                        <label for="donation">Round up to the nearest dollar for a donation?</label>
                        <input type="radio" id="donation_yes" name="donation" value="yes" checked> Yes
                        <input type="radio" id="donation_no" name="donation" value="no"> No
                    </fieldset>


                    <input type="submit" name="submit" value="Purchase">
                </form>
            </div>
            <div id="product-info-container">
            <div id="product-image-container">
                <img id="product-image" src="">
            </div>
            <br>
            <div id="quantity-message"></div>
            </div>
        </div>
    </main>

    <?php include("Unit4_footer.php"); ?>

</body>
<script>
    var productSelect = document.getElementById("product");
    var productImage = document.getElementById("product-image");
    var quantityMessage = document.getElementById("quantity-message");

    productSelect.addEventListener("change", function () {
        var selectedOption = productSelect.options[productSelect.selectedIndex];

        var imageURL = selectedOption.getAttribute("data-image");
        var quantity = selectedOption.getAttribute("data-quantity");

        productImage.src = imageURL;

        if (quantity === "0") {
            quantityMessage.textContent = "SOLD OUT";
        } else if (quantity < 5) {
            quantityMessage.textContent = "Only " + quantity + " left";
        } else {
            quantityMessage.textContent = "";
        }
    });


</script>

</html>