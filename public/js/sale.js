$(document).ready(function () {
    let items = [];
    // Select2 init
    $("#product_id").select2();

    let count = 1;
    let grandTotal = 0;

    function updateGrandTotal() {
        let discount = parseFloat($("#discount_percentage").val()) || 0;

        let finalTotal = grandTotal - (grandTotal * discount) / 100;

        $("#grandTotal").text(finalTotal.toFixed(2));
        $("#sub_total_input").val(grandTotal);
        $("#grand_total_input").val(finalTotal);
    }

    // Add to Invoice
    $("#addToInvoice").on("click", function () {
        let option = $("#product_id").find(":selected");

        let productId = option.val();
        let name = option.text();
        let price = parseFloat(option.data("price"));
        let qty = parseInt($("#quantity").val());

        if (!productId || qty <= 0) {
            alert("Please select product and quantity");
            return;
        }

        let total = price * qty;
        grandTotal += total;

        let row = `
            <tr>
                <td>${count}</td>
                <td>${name}</td>
                <td>${qty}</td>
                <td>${price}</td>
                <td>${total}</td>
                <td><button class="btn btn-danger btn-sm remove">X</button></td>
            </tr>
        `;

        $("#invoiceTable tbody").append(row);

        updateGrandTotal();

        count++;
        items.push({
            product_id: productId,
            quantity: qty,
            price: price,
            total: total,
        });

        $("#items_input").val(JSON.stringify(items));
    });

    // Remove row
    $(document).on("click", ".remove", function () {
        let row = $(this).closest("tr");
        let total = parseFloat(row.find("td:eq(4)").text());

        grandTotal -= total;

        row.remove();
        updateGrandTotal();
    });
    $("#discount_percentage").on("input", function () {
        updateGrandTotal();
    });
});
