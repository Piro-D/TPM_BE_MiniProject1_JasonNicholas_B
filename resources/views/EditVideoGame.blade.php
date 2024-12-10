<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Video Game</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GameTrack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Create">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>List a new video game</h2>

    <div class="p-5">
        <h1 class="text-center">Edit Video Game</h1>

        <form action="{{route('UpdateList', $VideoGame->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="" class="form-label">Game Title</label>
                <input value="{{$VideoGame->GameTitle}}" type="text" class="form-control" id="" name="GameTitle">
            </div>

            @error('GameTitle')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Developer</label>
                <input value="{{$VideoGame->Developer}}" type="text" class="form-control" id="" name="Developer">
            </div>

            @error('Developer')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Release Date</label>
                <input value="{{$VideoGame->ReleaseDate}}"type="date" class="form-control" id="" name="ReleaseDate">
            </div>

            @error('ReleaseDate')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Played Since</label>
                <input value="{{$VideoGame->PlayedSince}}"type="date" class="form-control" id="" name="PlayedSince">
            </div>

            @error('PlayedSince')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Platform</label>
                <select class="form-select" aria-label="Default select example" name="PlatformType">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->Platform }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Genre</label>
                <input value="{{$VideoGame->Genre}}" type="text" class="form-control" id="" name="Genre">
            </div>

            @error('Genre')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-lable">Image</label>
                <input type="file" class="form-control" id = "" name="image">
            </div>

            @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="Status">
                    <option value="Still Playing">Still Playing</option>
                    <option value="Completed">Completed</option>
                    <option value="On Hold">On Hold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
