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
    <div class="row justify-content-center mt-lg-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Book a Room
                </div>

                <div class="card-body">
                    <form action="{{route('booking')}}" method="post" >
                        @csrf

                        <div class="mb-3">
                            <input type="hidden" name="room_id" value="{{$room->id}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type='text' name="phone" class="form-control">
                            @error('phone')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check In</label>
                            <input type="date" name="check_in" class="form-control">
                            @error('check_in')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check Out</label>
                            <input type="date" name="check_out" class="form-control">
                            @error('check_out')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-outline-primary">Book Now</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>
        <div class="col-lg-4">
            <div class="card">
                <img src="{{asset('storage/feature_image/'.$room->feature_image)}}" >


                <div class="card-body">
                    <div class="card-title">
                        {{$room->name}}

                    </div>
                    <div class="card-text">
                        {{$room->description}}
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

