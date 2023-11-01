<body>
    <?php include("Unit4_header.php"); ?>
    <?php
    include 'Unit4_database.php';
    $conn = getConnection();
    date_default_timezone_set("America/Denver");
    $products = getAllBooks($conn) ?>
    <main>
        <div id="content-container">
            <div id="left">
                <h2>Welcome to Our Store</h2>

                <form>
                    <fieldset>
                        <input type="hidden" name="timestamp" id="timestamp" value="<?php echo time(); ?>">
                        <legend>Personal Information</legend>
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            onkeyup="showCustomerSuggestions(this.value, 'first')" required pattern="[A-Za-z\s']{1,}"
                            title="Only letters, spaces, and apostrophes are allowed"><br>

                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            onkeyup="showCustomerSuggestions(this.value, 'last')" required pattern="[A-Za-z\s']{1,}"
                            title="Only letters, spaces, and apostrophes are allowed"><br>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required type="email"><br>
                    </fieldset>

                    <fieldset>
                        <legend>Product Info</legend>
                        <select id="product" name="product" required>
                            <option disabled selected value="" data-image="" data-quantity=""> -- select a book --
                            </option>
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
                        <label for="available">Available</label>
                        <input type="text" id="available" name="available" readonly>
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required min="1" max="100"><br>
                    </fieldset>


                    <input  id="submit" type="submit" name="submit" value="Purchase">
                    <input type="reset" value="Clear All Fields" class="reset-button">

                </form>
            </div>
            <div id="right">
            </div>
        </div>
    </main>

    <?php include("Unit4_footer.php"); ?>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="Unit4_scripts.js"></script>

</html>