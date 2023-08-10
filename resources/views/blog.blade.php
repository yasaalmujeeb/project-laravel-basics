<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- font awesome cdn--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Blog Page</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h2 class="text-white">Your Posts
                            <a href="{{route('logout.user')}}" class="btn btn-danger float-right btn-sm m-3"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a href="/createpage" class="btn btn-info float-right btn-sm m-3" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="create post">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach ($posts as $post)
            <div class="col-md-4 mt-2">
                <div class="card">
                    @if(isset($post->image))
                    <img src="{{asset('uploads/posts/'.$post->image)}}" alt="image" class="card-img-top" height="200px">
                    @endif
                    <div class=" card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>

                    </div>
                    <div class="card-footer">
                        <a href="{{route('deletepost.user',['id'=>$post->id])}}" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                        <a href="{{route('updatepost.page',['id'=>$post->id])}} " class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-file-pen"></i>
                        </a>

                        <small class="text-muted">Last updated {{$post->updated_at}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</body>

</html>