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

            <div class="row">
                @foreach(\App\Models\Room::all() as $room)

                <div class="col-4">

                            <div class="card ">
                                <img src="{{asset('storage/feature_image/61f17b83b2766_feature_image.jpg')}}" class="card-img-top rounded" alt="...">
                                {{--                        <x-veno-box small="{{ asset('storage/feature_image/61f17b83b2766_feature_image.jpg') }}" ></x-veno-box>--}}

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
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
