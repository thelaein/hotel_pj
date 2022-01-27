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
                    <img src="{{asset('storage/feature_image/61f17b83b2766_feature_image.jpg')}}" class="card-img-top rounded" alt="...">


                    <div class="card-body">
                        <div class="card-title">
                            {{$room->name}}

                        </div>
                        <div class="card-text">
                            {{$room->description}}
                        </div>
                        <a href="{{route('room.index')}}" class="btn btn-outline-primary">Read All</a>

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
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
