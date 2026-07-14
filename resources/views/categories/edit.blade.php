
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    </head>
    <body>
      <br>
<div class="div">
        <div class="text-center">
            <h2>Edit Categories</h2>
        </div>
<div class="container">
<form action="{{route('categories.update',$data->id )}}" method="post" class="form">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label>Name</label>

    <input type="text" name="name"  value="{{$data->name}}" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary" >Update</button>
  


</form>
</div>

 <script>
    $(document).ready(function(){

        $(".form").submit(function(e){

            let confirmUpdate = confirm("Are you sure you want to update this category?");

            if(!confirmUpdate){
                e.preventDefault();
            }

        });

    });
    </script>

</body>