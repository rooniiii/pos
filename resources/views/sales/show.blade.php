<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Details</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Sale Information -->
    <div class="card shadow-lg border-0 mb-4">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Sale Details</h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <h5>
                        <strong>Sale ID :</strong>
                        #{{ $sale->id }}
                    </h5>
                    <h5>
                        <strong>Customer:</strong>
                        {{$sale->customer->name}}
                    </h5>
                </div>

                <div class="col-md-6 mb-3 text-md-end">
                    <h5>
                        <strong>Grand Total :</strong>
                        <span class="text-success">
                            Rs. {{ number_format($sale->grand_total,2) }}
                        </span>
                    </h5>
                </div>

            </div>

        </div>

    </div>

    <!-- Items Table -->
    <div class="card shadow-lg border-0">

        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Purchased Items</h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover table-striped align-middle text-center">

                    <thead class="table-dark">

                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($sale->saleItems as $item)

                        <tr>

                            <td>{{ $item->product->name }}</td>

                            <td>{{ $item->quantity }}</td>

                            <td>
                                Rs. {{ number_format($item->price,2) }}
                            </td>

                            <td>
                                Rs. {{ number_format($item->total,2) }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-danger fw-bold">
                                No Items Found
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
@php
$discountAmount = $sale->sub_total - $sale->grand_total;
@endphp  
         <tfoot>

                       <tr>
    <th colspan="3" class="text-end">Sub Total</th>
    <th>Rs. {{ number_format($sale->sub_Total,2) }}</th>
</tr>

<tr>
    <th colspan="3" class="text-end">Discount (%)</th>
    <th>{{ $sale->discount_percentage }} %</th>
</tr>

<tr>
    <th colspan="3" class="text-end">Discount Amount</th>
    <th class="text-danger">
        Rs. {{ number_format($discountAmount,2) }}
    </th>
</tr>

<tr class="table-primary">
    <th colspan="3" class="text-end">Grand Total</th>
    <th class="text-success">
        Rs. {{ number_format($sale->grand_total,2) }}
    </th>
</tr>
                    </tfoot>

                </table>

            </div>

            <div class="mt-4">

                <a href="{{ route('sales.index') }}" class="btn btn-secondary">
                    ← Back to Sales
                </a>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>