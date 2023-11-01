var productSelect = document.getElementById("product");
var availableField = document.getElementById("available");

productSelect.addEventListener("change", function () {
    var selectedOption = productSelect.options[productSelect.selectedIndex];
    var productId = selectedOption.value;

    if (productId) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                count = this.responseText;
                availableField.value = count;
            }
        };
        xmlhttp.open("GET", "Unit4_get_quantity.php?productId=" + productId, true);
        xmlhttp.send();

    } else {
        availableField.value = "";
    }
});

function showCustomerSuggestions(input, searchBy) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "Unit4_get_customer_table.php?input=" + input + "&searchBy=" + searchBy, true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("right").innerHTML = xmlhttp.responseText;
            highlight_row();
        }
    };
    xmlhttp.send();
}

function highlight_row() {
    var table = document.getElementById('table');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        var cell = cells[i];
        cell.onclick = function () {
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "yellow";
            rowSelected.className += " selected";
            document.getElementById('first_name').value = rowSelected.cells[0].innerHTML;
            document.getElementById('last_name').value = rowSelected.cells[1].innerHTML;
            document.getElementById('email').value = rowSelected.cells[2].innerHTML;
        }
    }

}

$(document).ready(function () {
    $("#submit").click(function () {
        var firstName = $("#first_name").val();
        var lastName = $("#last_name").val();
        var email = $("#email").val();
        var productID = $("#product").val();
        var quantity = $("#quantity").val();
        var available = $("#available").val();
        var timestamp = $("#timestamp").val();
        var dataString = 'firstName1=' + firstName + '&lastName1=' + lastName + '&email1=' + email + '&productID1=' + productID + '&quantity1=' + quantity + '&timestamp1=' + timestamp;
        if (firstName == '' || lastName == '' || email == '' || productID == '' || quantity == '') {
            alert("Please Fill All Fields");
        }
        else if (parseInt(quantity) > parseInt(available)) {
            alert('Quantity entered(' + quantity + ') is greater than available (' + available + ')!');
        }
        else {
            $.ajax({
                type: "POST",
                url: "Unit4_ajaxsubmit.php",
                data: dataString,
                cache: false,
                success: function (result) {
                    document.getElementById("right").innerHTML = '<p>' + result + '</p>';
                }
            });
        }
        return false;
    });
});