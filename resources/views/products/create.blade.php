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
      <br>
<div class="div">
       <center>
<h2>Product Name</h2>
       </center>
 
<div class="container">
<form action="{{route('products.store')}}" method="post">
    @csrf

  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label for="exampleInputPrice1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control">
  </div>

  <div class="mb-3">
    <label for="exampleInputstock" class="form-label">Stock</label>
    <input type="text" name="stock" class="form-control">
  </div>

  <div class="mb-3">
    <label for="exampleInputbarcode" class="form-label">Barcode</label>
    <input type="text" name="barcode" class="form-control">
  </div>


    <div class="mb-3">
      <select name="category_id" class="form-control">
    <option value="">-- Select Category --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
    </div>
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>