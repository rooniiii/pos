<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br>

    <div class="text-center">
        <h2>Index Form</h2>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">View</th>
            </tr>
        </thead>

        <tbody>

        @foreach($collect as $item)

        <tr>
            <th>{{ $item->id }}</th>
            <td>{{ $item->name }}</td>

            <td>
                <a href="{{ route('categories.edit',$item->id) }}" class="btn btn-primary editBtn ">Edit</a>
            </td>

            <td>
                <form action="{{ route('categories.destroy', $item->id) }}" method="POST" class="deleteForm">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>

            <td>
       <a href="{{ route('categories.show',$item->id) }}" class="btn btn-primary viewBtn">View</a>
            </td>
        </tr>

        @endforeach

        </tbody>
    </table>

    <!-- jQuery Delete Confirmation -->
    <script>
    $(document).ready(function(){

        $(".deleteForm").submit(function(e){

            let confirmDelete = confirm("Are you sure you want to delete this category?");

            if(!confirmDelete){
                e.preventDefault();
            }

        });

    });
    </script>
<script>
    $(document).ready(function(){

        $(".editBtn").click(function(e){

            let confirmEdit = confirm("Are you sure you want to edit this category?");

            if(!confirmEdit){
                e.preventDefault();
            }

        });

    });
    </script>

    <script>
    $(document).ready(function(){

        $(".viewBtn").click(function(e){

            let confirmView = confirm("Are you sure you want to view this category?");

            if(!confirmView){
                e.preventDefault();
            }

        });

    });
    </script>

</body>
</html>
