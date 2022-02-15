<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>


<header>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/perfect-resort-wallpaper-resort.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/6637784.jpg')}}" class="d-block w-100" alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</header>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <nav class="navbar navbar-expand-lg fixed-top navbar-light" >
                    <div class="container">


                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('room-ui')}}">Rooms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">About</a>
                                </li>
                            </ul>

                        </div>

                        <div class="col-lg-4 d-flex justify-content-center">
                            <a class="navbar-brand" href="{{route('index')}}">
                                <i class="fa-brands fa-vimeo-v"></i>
                                Villas
                            </a>
                        </div>

                        <div class="col-lg-4 d-flex flex-row-reverse">
                            <ul class="navbar-nav d-inline-flex p-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>

                        </div>


                    </div>
                </nav>
            </div>

        </div>
    </div>


<div class="container">

    <div class="row">
        @foreach(\App\Models\Room::all() as $room)

            <div class="col-sm-12 col-md-6 col-lg-4">

                <div class="card ">
                    <img src="{{asset('storage/feature_image/'.$room->feature_image)}}" >

                    <div class="card-body">
                        <h5 class="card-title">{{$room->name}}</h5>
                        <p class="card-text">{{$room->description}}</p>
                    </div>
                    <div class="card-footer d-inline-block ">
                        <a href="{{route('detail',$room->slug)}}" class=" bg-secondary btn text-light">See More</a>
                        <a href="{{route('books',$room->id)}}" class="btn btn-outline-primary">Book Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>






<footer>
    <div class="container">

    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
