<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Authentication</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Admin Checking</h1>
                <form action="{{route('admin.auth')}}" method="POST">
                    @csrf
                    @error('error')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Check</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>