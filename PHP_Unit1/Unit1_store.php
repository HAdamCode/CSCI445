<body>
    <?php include("Unit1_header.php"); ?>
    <main>
        <div id="content-container">
            <div id="left-content">
                <h2>Welcome to Our Store</h2>

                <form action="Unit1_process_order.php" method="post">
                    <fieldset>
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
                            <option value="" disabled selected> -- select a book --</option>
                            <option value="book1" data-image="images/ACourtOfThornsAndRoses.webp">A Court of Thorns and
                                Roses ($10)
                            </option>
                            <option value="book2" data-image="images/ACourtOfMistAndFury.webp">A Court of Mist and Fury
                                ($15)
                            </option>
                            <option value="book3" data-image="images/ACourtOfWingsAndRuin.jpg">A Court of Wings and Ruin
                                ($25)
                            </option>
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
            <div id="product-image-container">
                <img id="product-image" src="">
            </div>
        </div>
    </main>

    <?php include("Unit1_footer.php"); ?>

</body>
<script>
    var productSelect = document.getElementById("product");
    var productImage = document.getElementById("product-image");

    productSelect.addEventListener("change", function () {
        var selectedOption = productSelect.options[productSelect.selectedIndex];
        var imageURL = selectedOption.getAttribute("data-image");
        productImage.src = imageURL;
    });
</script>

</html>