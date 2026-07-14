<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<br>

<center>
    <h2>Product List</h2>
</center>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Barcode</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>View</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($data as $item)

        <tr>
            <th>{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->stock }}</td>
            <td>{{ $item->barcode }}</td>

            <td>
 <form action="{{ route('products.destroy',$item->id) }}" method="POST" class="deleteForm">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>

            <td>
                <a href="{{ route('products.edit',$item->id) }}" class="btn btn-primary editBtn">
                    Edit
                </a>
            </td>

            <td>
                <a href="{{ route('products.show',$item->id) }}" class="btn btn-info viewBtn">
                    View
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

<script>
$(document).ready(function(){

    $(".deleteForm").submit(function(e){

        let confirmDelete = confirm("Are you sure you want to delete this product?");

        if(!confirmDelete){
            e.preventDefault();
        }

    });

});
</script>
<script>
$(document).ready(function(){

    $(".editBtn").click(function(e){

        let confirmEdit = confirm("Do you want to edit this page?");

        if(!confirmEdit){
            e.preventDefault();
        }

    });

});
</script>

<script>
$(document).ready(function(){

    $(".viewBtn").click(function(e){

        let confirmView = confirm("Do you want to view this page?");

        if(!confirmview){
            e.preventDefault();
        }

    });

});
</script>

</body>
</html>