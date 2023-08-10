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
    <title>Create Post</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center text-primary">Create Post
                            <a href="{{route('logout.user')}}" class="btn btn-danger float-right btn-sm"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a href="/blog" class="btn btn-info float-left btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="back">
                                <i class="fa-solid fa-backward"></i>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if (session('status'))
                <p class="alert alert-success">{{session('status')}}</p>
                @endif
                @error('error')
                <p class="alert alert-danger">{{$message}}</p>
                @enderror
                <form action="{{route('createpost.user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image"></label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>