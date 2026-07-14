<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <br>
    <div class="div">
        <div class="text-center">
            <h2>Categories Form</h2>
        </div>

        <div class="container">
            <form action="{{ route('categories.store') }}" method="post" class="form">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

               


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
     

<script>
    $(document).ready(function () {
    console.log("JS loaded");

    $(".form").submit(function (e) {
        console.log("submit fired");

        if (!confirm("Are you sure?")) {
            e.preventDefault();
        }
    });
});
</script>
</body>
