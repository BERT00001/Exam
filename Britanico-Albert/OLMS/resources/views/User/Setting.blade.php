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

    <!-- Edit | Profile -->
    <form action="{{ route('Settings.Save', ['id' => $usr->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('put') }}
        Name: <input class="form-control" type="text" placeholder="Book Title" name="Name" value="{{$usr -> name}}"
            required /><br>
        Email: <input class="form-control" type="text" placeholder="Book Title" name="Email" value="{{$usr -> email}}"
            required /><br>
        Previous Password: <input class="form-control" type="password" name="PPassword" value="{{$usr -> password}}"
            Disabled /><br>
        New Password: <input class="form-control" type="password" name="Password" name="Password" /><br>


        <button class="btn btn-info">Save</button>

    </form>

    <!-- Disable | Account -->
    <form action="{{ route('Settings.Disable', ['id' => $usr->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('put') }}

        <button class="btn btn-danger"> Disable Account </button>

    </form>

    @endsection


    <!-- Bootstrap | Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>