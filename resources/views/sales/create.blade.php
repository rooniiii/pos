<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .page-header{
            background:#111827;
            color:white;
            padding:20px;
            border-radius:12px;
            margin-bottom:25px;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .card-header{
            background:white;
            border-bottom:1px solid #eee;
            font-weight:600;
            font-size:20px;
        }

        .btn-add{
            background:#0d6efd;
            color:white;
            font-weight:600;
            border-radius:8px;
        }

        .btn-add:hover{
            background:#0b5ed7;
            color:white;
        }

        .select2-container .select2-selection--single{
            height:40px !important;
            padding-top:5px;
        }
    </style>
</head>

<body>
<form action="{{ route('sales.store') }}" method="POST">
    @csrf
  

<div class="container py-5">

    <div class="page-header shadow">
        <h2 class="mb-0">🛒 POS Sale System</h2>
        <small>Create New Sale</small>
    </div>

    <div class="card shadow mb-4">

    <div class="card-header">
        Customer Information
    </div>

    <div class="card-body">

        <label class="form-label fw-bold">
            Select Customer
        </label>

        <select name="customer_id" class="form-select">

            <option value="">
                Choose Customer
            </option>

            @foreach($customers as $customer)

            <option value="{{ $customer->id }}">
                {{ $customer->name }} - {{ $customer->phone }}
            </option>

            @endforeach

        </select>

    </div>

</div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg">

                <div class="card-header">
                    Product Selection
                </div>

                <div class="card-body">

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Select Product
                        </label>

                        <select class="form-select" id="product_id">

                            <option value="">
                                Search Product...
                            </option>

                            @foreach($products as $product)

                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Quantity Box -->
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Quantity
                        </label>

                        <input type="number"
                               class="form-control"
                               id="quantity"
                               value="1"
                               min="1">

                    </div>

                  <button type="button" class="btn btn-add w-100" id="addToInvoice">
    + Add to Invoice
</button>

                </div>
            </div>

            <div class="table-responsive mt-4">

         <table class="table table-bordered table-hover text-center" id="invoiceTable">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>

                    <tbody></tbody>

                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Grand Total</th>
                            <th id="grandTotal">0</th>
                            <th></th>
                        </tr>
                    </tfoot>

                </table>
 <input type="hidden" name="items" id="items_input">
<input type="hidden" name="grand_total" id="grand_total_input">
<input type="hidden" name="sub_total" id="sub_total_input">

<div class="mb-3">
    <label class="form-label fw-bold">Discount (%)</label>

    <input type="number"
           class="form-control"
           id="discount_percentage"
           name="discount_percentage"
           value="0"
           min="0"
           max="100">
</div>

<button type="submit" class="btn btn-success mt-1">
    Save Sale
</button>

            </div>

        </div>

    </div>

</div>

<!-- JS LINKS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script>
    
$(document).ready(function () {

    let items=[];
    // Select2 init
    $('#product_id').select2();

    let count = 1;
    let grandTotal = 0;

function updateGrandTotal() {

    let discount = parseFloat($('#discount_percentage').val()) || 0;

    let finalTotal = grandTotal - (grandTotal * discount / 100);

    $('#grandTotal').text(finalTotal.toFixed(2));
$('#sub_total_input').val(grandTotal);
    $('#grand_total_input').val(finalTotal);
}



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

        updateGrandTotal();

        count++;
        items.push({
    product_id: productId,
    quantity: qty,
    price: price,
    total: total
});

$('#items_input').val(JSON.stringify(items));


    });

    // Remove row
    $(document).on('click', '.remove', function () {

        let row = $(this).closest('tr');
        let total = parseFloat(row.find('td:eq(4)').text());

        grandTotal -= total;

        

        row.remove();
          updateGrandTotal();

    });
$('#discount_percentage').on('input', function () {
    updateGrandTotal();
});
});
</script>



</form>
</body>
</html>
