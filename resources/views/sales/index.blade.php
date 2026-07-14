<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Sales List</h3>

                <span class="badge bg-warning text-dark fs-6">
                    Total Sales : {{ $sales->count() }}
                </span>
            </div>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover table-striped align-middle text-center">

                    <thead class="table-dark">

                        <tr>
                            <th width="120">Sale ID</th>
                            <th>Customer</th>
                            <th>Grand Total</th>
                            <th width="180">Action</th>

                            
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($sales as $sale)

                        <tr>

                            <td>
                                <strong>#{{ $sale->id }}</strong>
                            </td>
<td>
{{$sale->customer->name}}
</td>
                            <td>
                                Rs. {{ number_format($sale->grand_total,2) }}
                            </td>

                            <td>

                                <a href="{{ route('sales.show',$sale->id) }}"
                                   class="btn btn-primary btn-sm">

                                    View Details

                                </a>

                                                       <a href="{{ route('sales.invoice', $sale->id) }}"
   class="btn btn-success btn-sm">
    Invoice
</a>
     
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-danger fw-bold">
                                No Sales Available
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>