
$(document).ready(function () {

    // Select2 init
    $('#product_id').select2();

    let count = 1;
    let grandTotal = 0;

    // Add to Invoice
    $('#addToInvoice').on('click', function () {

        let option = $('#product_id').find(':selected');

        let productId = option.val();
        let name = option.text();
        let price = parseFloat(option.data('price'));
        let qty = parseInt($('#quantity').val());

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

        $('#invoiceTable tbody').append(row);

        $('#grandTotal').text(grandTotal);

        count++;

    });

    // Remove row
    $(document).on('click', '.remove', function () {

        let row = $(this).closest('tr');
        let total = parseFloat(row.find('td:eq(4)').text());

        grandTotal -= total;

        $('#grandTotal').text(grandTotal);

        row.remove();

    });

});