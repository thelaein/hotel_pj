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
<div class="container">
    <header>
        <div class="container" style="background-color: #e3f2fd;">
            <div class="row align-items-center">
                <div class="col-sm-5 col-md-4 col-lg-4">
                    <nav class="navbar navbar-expand-lg navbar-light" >
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
                        </div>
                    </nav>
                </div>
                <div class="col-sm-2 col-md-4 col-lg-4">
                    <a class="navbar-brand" href="{{route('index')}}">Villas</a>
                </div>
                <div class="col-sm-5 col-md-4 col-lg-4">
                    <div class="book-room">
                        <div class="btn-group mt-4">
                            <a class="px-2" href="#">
                                <i class="fab fa-facebook-square"></i>
                            </a>

                            <a class="px-2" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a class="px-2" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
{{--                        <div class="btn">--}}
{{--                            <a class="btn btn-primary my-3" href="{{route('booking')}}">Book a Room</a>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </header>

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
                        <a href="{{route('book',$room->id)}}" class="btn btn-outline-primary">Book Now</a>
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
