<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- font awesome cdn--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin page</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="card align-items-center bg-dark">
                    <h1 class="text-white">Admin Page
                        <a href="{{route('admin.logout')}}" class="btn btn-danger float-right btn-sm m-3"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">password</th>
                                <th scope="col">View</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                            <tr>
                                <th scope="row">{{$data->id}}</th>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->password}}</td>
                                <td>
                                    <a href="{{route('admin.view',['id'=>$data->id])}}" class="btn btn-warning btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="view user">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="update user">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('delete.user',['id'=>$data->id])}}" class="btn btn-danger btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="delete user">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>