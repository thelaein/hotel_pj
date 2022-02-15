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
        <div class="col-4">
            <div class="my-5">
                <div class="card">

                    <img src="{{asset('storage/feature_image/'.$room->feature_image)}}" >

                    <div class="card-body">
                        <div class="card-title">
                            {{$room->name}}

                        </div>
                        <div class="card-text">
                            {{$room->description}}
                        </div>
                        <a href="{{route('books',$room->id)}}" class="btn btn-outline-primary">Book Now</a>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-4 ">
            <div class="my-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Room Features
                    </div>
                    <div class="card-body">
                        <ul class="list">
                            @foreach($room->features as $feature)
                            <li class="list-item">{{$feature->slug}}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
