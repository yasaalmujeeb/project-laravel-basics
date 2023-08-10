<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Register Page</h1>
                <form action="{{route('register.user')}}" method="POST">
                    @csrf
                    @error('error')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">Name</label><input type="text" class="form-control" name="name" id="name"
                            placeholder="your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><input type="email" class="form-control" name="email" id="email"
                            placeholder="xyz@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><input type="password" class="form-control"
                            name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Retype password</label><input type="password" class="form-control"
                            name="confirmpassword" id="confirmpassword">
                        @error('cpassword')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>