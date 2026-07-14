<!DOCTYPE html>
<html>

<head>

<title>Customer Detail</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-primary text-white">

<h3>Customer Detail</h3>

</div>


<div class="card-body">


<h5>Name:</h5>
<p>{{ $customer->name }}</p>


<h5>Phone:</h5>
<p>{{ $customer->phone }}</p>


<h5>Email:</h5>
<p>{{ $customer->email }}</p>


<h5>Address:</h5>
<p>{{ $customer->address }}</p>
<hr>

<h4>Sales History</h4>

@if($customer->sales->count() > 0)

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Sale ID</th>
            <th>Grand Total</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    @foreach($customer->sales as $sale)

        <tr>
            <td>{{ $sale->id }}</td>
            <td>{{ $sale->grand_total }}</td>
            <td>
                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm">
                    View
                </a>
            </td>
        </tr>

    @endforeach

    </tbody>

</table>

@else

<p>No Sales Found.</p>

@endif 

<a href="{{ route('customers.index') }}" class="btn btn-secondary">
Back
</a>


</div>


</div>


</div>


</body>

</html>