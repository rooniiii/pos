 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    </head>
    <body>
<div class="container">
       <center>
<h2> Product Details</h2>
       </center>
 

<form>

<div class="mb-3">
<label class="form-label">ID</label>
<input type="text" class="form-control" value="{{ $data->id }}" readonly>
</div>

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" class="form-control" value="{{ $data->name }}" readonly>
</div>

<div class="mb-3">
<label class="form-label">Price</label>
<input type="text" class="form-control" value="{{ $data->price }}" readonly>
</div>

<div class="mb-3">
<label class="form-label">Stock</label>
<input type="text" class="form-control" value="{{ $data->stock }}" readonly>
</div>

<div class="mb-3">
<label class="form-label">Barcode</label>
<input type="text" class="form-control" value="{{ $data->barcode }}" readonly>
</div>

<div class="mb-3">
<label class="form-label">Category</label>
<input type="text" class="form-control" 
value="{{ $data->category ? $data->category->name : 'N/A' }}" readonly>
</div>




</form>
</div>
</body>
