<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Customer</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-warning">

            <h3 class="mb-0">
                Edit Customer
            </h3>

        </div>

        <div class="card-body">

            <form action="{{ route('customers.update', $customer->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">Customer Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $customer->name }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ $customer->phone }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $customer->email }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">Address</label>

                    <textarea name="address"
                              class="form-control"
                              rows="3">{{ $customer->address }}</textarea>

                </div>

                <button type="submit" class="btn btn-success">
                    Update Customer
                </button>

                <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>