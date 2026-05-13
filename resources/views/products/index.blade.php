

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
</head>
<body>
    <br>
<center>
        <h2>Product Edit Form</h2>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                 <th scope="col">Price</th>
                  <th scope="col">Stock</th>
                   <th scope="col">Barcode</th>
                <th scope="col">Delete</th>
                 <th scope="col">Edit</th>
                  <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <th>{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                     <td>{{ $data->price }}</td>
                      <td>{{ $data->stock }}</td>
                       <td>{{ $data->barcode }}</td>
 

    
  <td>  <form action="{{route('products.destroy',$data->id)}}"method="POST">
                             @csrf
                            @method('DELETE')
 
         <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
<td> <a href="{{route('products.edit',$data->id)}}"class="btn btn-primary">Edit </a> </td>
 
<td>
    <a href="{{ route('products.show',$data->id) }}" class="btn btn-info">View</a>
</td>
                      
         
                    
                      
                     
                </tr>
            @endforeach

        </tbody>
    </table>