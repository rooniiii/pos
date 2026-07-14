<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Bootstrap 5 -->
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
@media print {

    .btn {
        display: none;
    }

    body {
        background: white !important;
    }

    .card {
        border: none;
        box-shadow: none !important;
    }

}
</style>

</head>

<body class="bg-light">

<div class="container mt-5">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card shadow">

        <div class="card-body">

            

            <hr>

            
                <div class="row">

    <div class="col-md-6">

        <h2>🛒 POS Sale System</h2>

        

        <p class="mb-0">University Road, Sargodha</p>

        <p class="mb-0">Phone: 0300-1234567</p>

        <p>Email: abcmart@gmail.com</p>

    </div>

    <div class="col-md-6 text-end">

        <h2>INVOICE</h2>

        <p><strong>Invoice #:</strong> INV-{{ str_pad($sale->id, 5, '0', STR_PAD_LEFT) }}</p>

        <p><strong>Date:</strong> {{ $sale->created_at->format('d-m-Y h:i A') }}</p>

    </div>

</div>

<hr>
<div class="card mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Customer Details</h5>
    </div>

   <div class="card-body">

    <p class="mb-1">
        <strong>Name:</strong> {{ $sale->customer->name }}
    </p>

    <p class="mb-1">
        <strong>Phone:</strong> {{ $sale->customer->phone }}
    </p>

    <p class="mb-1">
        <strong>Email:</strong> {{ $sale->customer->email }}
    </p>

    <p class="mb-1">
        <strong>Address:</strong> {{ $sale->customer->address }}
    </p>

</div>

        </div>

        

    

    </div>

</div>
            </p>

        </div>

    </div>

</div>
<div class="card mt-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Product Details</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>

            </thead>

            <tbody>

                @foreach($sale->saleItems as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->product->name }}</td>

                    <td>{{ $item->quantity }}</td>

            <td class="text-end">Rs {{ number_format($item->price, 2) }}</td>

                    <td class="text-end">Rs {{ number_format($item->quantity * $item->price, 2) }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
<div class="row mt-4">

    <div class="col-md-6">
    </div>

    <div class="col-md-6">

        <table class="table table-bordered">

            <tr>
                <th>Subtotal</th>
                <td class="text-end">
                    Rs {{ number_format($sale->sub_total, 2) }}
                </td>
            </tr>

            <tr>
                <th>Discount ({{ $sale->discount_percentage }}%)</th>
                <td class="text-end">
                    Rs {{ number_format($sale->sub_total - $sale->grand_total, 2) }}
                </td>
            </tr>

         <tr class="table-success">

    <th colspan="4" class="text-end fs-5">
        Grand Total
    </th>

    <th class="text-end fs-5">
        Rs {{ number_format($sale->grand_total,2) }}
    </th>

</tr>
        </table>

    </div>
    <hr>

<div class="text-center mt-4">

    <h5>Thank You for Your Purchase!</h5>

    <p class="mb-0">
        We appreciate your business.
    </p>

    <p class="mb-0">
        Please visit us again.
    </p>

</div>
<div class="text-center mt-4">

    <button class="btn btn-primary" onclick="window.print()">
        Print Invoice
    </button>

    
<a href="{{ route('sales.sendEmail', ['id' => $sale->id]) }}" class="btn btn-primary">
    📧 Send Email
</a>

    <a href="{{ route('sales.pdf', $sale->id) }}" class="btn btn-danger">
        Download PDF
    </a>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
</div>

</body>
</html>