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
                                <input type="file" name="feature_image" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="price" value="{{old('price',$room->price)}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Room Feature</label>
                                <br>
                                @foreach(\App\Models\Feature::all() as $feature)
                                    <input class="form-check-input" type="checkbox" {{in_array($feature->id,old('features',$room->features->pluck('id')->toArray()))?'checked':''}} name="features[]" value="{{$feature->id}}" id="feature{{$feature->id}}">
                                    <label class="form-check-label" for="feature{{$feature->id}}">
                                        {{$feature->name}}
                                    </label>
                                @endforeach
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Manage Photo</div>
                    <div class="card-body">
                        <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data" id="uploaderForm" class="d-none">
                            @csrf
                            <input type="hidden" value="{{$room->id}}" name="room_id">
                            <input type="file" class="form-control" accept="image/jpeg,image/png" id="uploaderInput" name="photos[]" multiple >
                            <button class="btn btn-outline-primary">Upload</button>
                        </form>
                        <div class="mb-3 ">
                            <div class="d-inline-flex justify-content-center align-items-center border border-dark border-3 px-3 rounded" id="uploaderUi">
                                <i class="fas fa-plus-circle fa-2x"></i>
                            </div>
                            @forelse($room->photos as $photo)

                                <div class="d-inline-block position-relative" style="width: 100px; height: 100px;">
                                    <img src="{{asset('storage/thumbnail/'.$photo->name)}}" class="position-absolute" height="100" alt="">
                                    <form action="{{route('photo.destroy',$photo->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm position-absolute" style="bottom: 5px;right: 5px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        let uploaderUi =document.getElementById('uploaderUi');
        let uploaderInput =document.getElementById('uploaderInput');
        let uploaderForm =document.getElementById('uploaderForm');
        uploaderUi.addEventListener('click',function (){
            uploaderInput.click();
        })
        uploaderInput.addEventListener('change',function (){
            uploaderForm.submit();
        })


    </script>
@endsection
