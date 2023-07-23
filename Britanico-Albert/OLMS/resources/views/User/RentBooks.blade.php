<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <!-- Link to Admin Dashboard -->
        <a href="{{route('User.BorrowedBooks')}}" class="btn btn-primary">Borrowed Books</a><br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Borrowed Books') }}</div>
                    <div class="text-left">

                    </div>
                    <!-- Book List Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Copies</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Fetch as $bk)
                            <tr>
                                <th>{{$bk -> Title}}</th>
                                <th>{{$bk -> Author}}</th>
                                <th>{{$bk -> Copies}}</th>

                                <th>

                                    <form action="{{ url('/User/BorrowedBooks/Add', ['id' => $bk->id]) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <button class="btn btn-info btn-sm"> Borrow </button>


                                    </form>


                                </th>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>