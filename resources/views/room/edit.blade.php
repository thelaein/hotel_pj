@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Room
                    </div>
                    <div class="card-body">
                        <form action="{{route('room.update',$room->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Room Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$room->name)}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Feature Image</label>
                                <input type="file" name="featureimg" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="price" value="{{old('price',$room->price)}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="description" id="" cols="30" rows="10"  class="form-control @error('description') is-invalid @enderror">{{old('description',$room->description)}}</textarea>

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-outline-primary">Update Room</button>
                            </div>

                            @error('title')
                            <p class="text-danger small">{{$message}}</p>
                            @enderror

                        </form>

                        @if (session('status'))
                            <p class="alert alert-success">{{session('status')}}</p>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
