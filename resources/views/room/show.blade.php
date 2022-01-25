@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{$room->name}}
                    </div>
                    <div class="card-body">
                        {{$room->description}}
                        <hr>

                        <a href="{{route('room.index')}}" class="btn btn-outline-primary">Read All</a>

                    </div>
                    </div>



            </div>
        </div>
    </div>
@stop
