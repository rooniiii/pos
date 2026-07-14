
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add New Customer</h3>
        </div>


        <div class="card-body">

            <form action="{{ route('customers.store') }}" method="POST">

                @csrf


                <div class="mb-3">
                    <label class="form-label">
                        Customer Name
                    </label>

                    <input 
                    type="text" 
                    name="name" 
                    class="form-control"
                    placeholder="Enter customer name">
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Phone Number
                    </label>

                    <input 
                    type="text" 
                    name="phone" 
                    class="form-control"
                    placeholder="Enter phone number">
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Email
                    </label>

                    <input 
                    type="email" 
                    name="email" 
                    class="form-control"
                    placeholder="Enter email">
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Address
                    </label>

                    <textarea 
                    name="address" 
                    class="form-control"
                    rows="3"
                    placeholder="Enter address"></textarea>
                </div>


                <button type="submit" class="btn btn-success">
                    Save Customer
                </button>


                <a href="{{ route('customers.index') }}" 
                   class="btn btn-secondary">
                    Back
                </a>


            </form>

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>