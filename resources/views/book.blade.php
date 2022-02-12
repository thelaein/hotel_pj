@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Book a Room
                    </div>
                    <div class="card-body">
                        <form action="{{route('booking.store')}}" method="post" >
                            @csrf

                            <input type="hidden" name="room_id" value="{{$room->id}}">

{{--                            <div class="mb-3">--}}
{{--                                <input type="hidden" name="room_id" value="{{}}" class="form-control">--}}
{{--                            </div>--}}

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
                                <input type="number" name="phone" class="form-control">
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
            <div class="col-6">
                <div class="card">
                    <img src="{{asset('storage/feature_image/61f17b83b2766_feature_image.jpg')}}" class="card-img-top rounded" alt="...">


                    <div class="card-body">
                        <div class="card-title">
                            {{$room->name}}

                        </div>
                        <div class="card-text">
                            {{$room->description}}
                        </div>
                        <a href="" class="btn btn-outline-primary">Book Now</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
