<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Books</title>
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
    <h1>Edit Books</h1>

    <!-- Link to Book Management -->
    <a href="/admin/Books" class="btn btn-primary">Book Manage</a>

    <!-- Form to edit the book (if there's a book to edit) -->
    @if (session('edited_book'))
    <form action="{{ route('Books.change', ['id' => session('edited_book')->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('put') }}

        Title: <input class="form-control" type="text" placeholder="Book Title" name="Title"
            value="{{ session('edited_book')->Title }}" required /><br>

        Author: <input class="form-control" type="text" placeholder="Author Fullname" name="Author"
            value="{{ session('edited_book')->Author }}" required /><br>

        No. Copies: <input class="form-control" type="number" placeholder="No. of Copies" name="Copies"
            value="{{ session('edited_book')->Copies }}" required />

        No. of Borrower: <input class="form-control" type="number" placeholder="No. of Copies" name="Borrowed"
            value="{{ session('edited_book')->Borrowed }}" required />

        <button class="btn btn-info">Change</button>

    </form>
    @endif
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