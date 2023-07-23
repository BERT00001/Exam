<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <!-- Link to Admin Dashboard -->
        <a href="Dashboard" class="btn btn-primary">Admin Dashboard</a><br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of Books') }}</div>
                    <div class="text-left">
                        <!-- Add Book Button (Opens Modal) -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#AddModal">Add Book</button><br>
                    </div>
                    <!-- Book List Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Copies</th>
                                <th scope="col">Borrow</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through books and display in table -->
                            @foreach($Fetch as $bk)
                            <tr>
                                <th>{{ $bk->id }}</th>
                                <th>{{ $bk->Title }}</th>
                                <th>{{ $bk->Author }}</th>
                                <th>{{ $bk->Copies }}</th>
                                <th>{{ $bk->Borrowed }}</th>
                                <td>
                                    <!-- Delete Book Form -->
                                    <form action="{{ route('books.delete', ['id' => $bk->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                    <!-- View Book Form -->
                                    <form action="{{ route('books.Edit', ['id' => $bk->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button class="btn btn-info btn-sm">View</button>
                                    </form>

                                    <!-- Edit Book Modal Button (currently commented out) -->
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal">Edit</button> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals | Add Books -->
    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Books</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Book Form -->
                    <form action="Books/add" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        Title: <input class="form-control" type="text" placeholder="Book Title" name="Title"
                            required /><br>
                        Author: <input class="form-control" type="text" placeholder="Author Fullname" name="Author"
                            required /><br>
                        No. Copies: <input class="form-control" type="number" placeholder="No. of Copies" name="Copies"
                            required />
                        No. of Borrower: <input class="form-control" type="number" placeholder="No. of Copies"
                            name="Borrowed" required />
                        <button>Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>