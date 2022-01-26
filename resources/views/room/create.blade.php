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
                        <form action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Room Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Room Features</label>
                                <br>
                                @foreach(\App\Models\Feature::all() as $feature)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" {{in_array($feature->id,old('features',[])) ? 'checked' : ''}} name="features[]" value="{{$feature->id}}" id="feature{{$feature->id}}">
                                        <label class="form-check-label" for="feature{{$feature->id}}">
                                            {{$feature->name}}
                                        </label>
                                    </div>
                                @endforeach
                                @error('feature')
                                <p class="text-danger small">{{$message}}</p>
                                @enderror
                                @error('features.*')
                                <p class="text-danger small">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Feature Image</label>
                                <input type="file" name="featureimg" class="form-control" >
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-outline-primary">Create Room</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
