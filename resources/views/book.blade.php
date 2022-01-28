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
                        <form action="{{route('book.store')}}" method="post" >
                            @csrf

{{--                            <div class="mb-3">--}}
{{--                                <input type="hidden" name="room_id" value="{{}}" class="form-control">--}}
{{--                            </div>--}}

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Check In</label>
                                <input type="date" name="check_in" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Check Out</label>
                                <input type="date" name="check_out" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button class="btn btn-outline-primary">Book Now</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
