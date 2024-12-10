<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .carousel-item img {
        width: 100%; /* Responsive width */
        height: 25%; /* Maintains aspect ratio */}
    </style>


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
                        <a class="nav-link" href="/Create">Create</a>
                    </li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" >
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>

            <a href="{{route('register')}}" class="btn btn-success">Register</a>
        </div>
    </nav>



    <div class="title" style="text-align: center;">
        <h1>Welcome to GameTrack!!!</h1>
        <h2>The website that allows you to list all the video games you have played and rate them!!</h2>
    </div>

    <hr>

    <div  style="max-width: 1000px; margin: auto;">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('images/Apex.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/Fortnite.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/048696200_1600396266-League-of-Legends-Wild-Rift.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/wp7487062-genshin-impact-wallpapers.jpg')}}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <hr class="colored-hr">

    <div class="m-5">
        <a href = "{{route('create')}}">
        <button class="btn btn-success">Create</button>
        </a>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-5">
        @foreach ($VideoGames as $index => $VideoGame)
            <div class="card" style="width: 19rem;">
                <img src="{{asset('storage/images/'.$VideoGame->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Game Title: {{$VideoGame->GameTitle}} </h5>
                    <p class="card-text">Developer: {{$VideoGame->Developer}}</p>
                    <p class="card-text">Release Date: {{$VideoGame->ReleaseDate}}</p>
                    <p class="card-text">Played since: {{$VideoGame->PlayedSince}}</p>
                    <p class="card-text">Platform: {{$VideoGame->category->Platform}}</p>
                    <p class="card-text">Genre: {{$VideoGame->Genre}}</p>
                    <p class="card-text">Status: {{$VideoGame->Status}}</p>
                    <a href="{{route('edit', $VideoGame->id)}}" class="btn btn-success">Edit</a>

                    <form action = "{{route('DeleteGame', $VideoGame->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
