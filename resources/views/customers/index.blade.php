<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customers List</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="mb-0">Customers List</h3>

                <a href="{{ route('customers.create') }}" class="btn btn-light">
                    Add Customer
                </a>

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

                            <th width="80">ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th width="250">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($customers as $customer)

                        <tr>

                            <td>{{ $customer->id }}</td>

                            <td>{{ $customer->name }}</td>

                            <td>{{ $customer->phone }}</td>

                            <td>

                                <a href="{{ route('customers.show', $customer->id) }}"
                                   class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('customers.edit', $customer->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('customers.destroy', $customer->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this customer?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-danger fw-bold">
                                No Customers Found
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