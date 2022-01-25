@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit Feature
                    </div>
                    <div class="card-body">
                        <form action="{{route('feature.update',$feature->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-4">
                                    <div class="">
                                        <input type="text" value="{{old('name',$feature->name)}}" class="form-control @error('name') is-invalid @enderror " name="name">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-outline-primary ">Edit</button>

                                </div>
                            </div>
                            @error('name')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </form>
                        @if(session('status'))
                            <p class="alert alert-success">{{session('status')}}</p>
                        @endif
                    </div>
                </div>
                @include('feature.list')

            </div>
        </div>
    </div>
@stop
