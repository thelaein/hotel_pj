@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Room List
                    </div>
                    <div class="card-body">


                        @if (session('status'))
                            <p class="alert alert-success">{{session('status')}}</p>
                        @endif


                        <div class="d-flex justify-content-between">
{{--                            {{$posts->appends(request()->all())->Links()}}--}}
                            <form>
                                <div class="input-group  mb-3" >
                                    <input type="text" class="form-control" name="search" placeholder="Search Anything" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary" id="button-addon2">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>



                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="w-25">Name</th>
                                <th>Photo</th>
                                <th>Features</th>
                                <th>Price</th>
                                <th>Description</th>
                                @if(Auth::user()->role == 0)
                                    <th>Owner</th>
                                @endif
                                <th>Control</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rooms as $room)
                                <tr>
                                    <td>{{$room->id}}</td>
                                    <td>
                                        <img src="{{asset('storage/feature_image/'.$room->feature_image)}}" class="me-2" width="38" alt="">
                                        {{\Illuminate\Support\Str::words($room->name,5)}}
                                    </td>

                                    <td>
                                        @forelse($room->photos as $photo)
                                            <a class="venobox" data-gall="gallery{{$room->id}}" href="{{asset('storage/photo/'.$photo->name)}}">
                                                <img src="{{asset('storage/thumbnail/'.$photo->name)}}" height="40" ></a>
                                        @empty
                                            <p class="text-muted small">no photo</p>
                                        @endforelse
                                    </td>

                                    <td>
                                        @foreach($room->features as $feature)
                                            <span class="badge bg-success small rounded-pill">
                                                <i class="fas fa-hashtag"></i>
                                                {{$feature->name}}
                                            </span>
                                        @endforeach
                                    </td>

                                    <td>
                                        {{$room->price}}
                                    </td>

                                    <td>{{Str::words($room->description,5)}}</td>

                                    <td>{{$room->user->name}}</td>



{{--                                    @if(Auth::user()->role == 0)--}}
{{--                                        <td>{{$post->user->name}}</td>--}}
{{--                                    @endif--}}

                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('room.show',$room->id) }}">
                                                <i class="fas fa-info fa-fw"></i>
                                            </a>

{{--                                            @can('view',$post)--}}
                                                <a class="btn btn-sm btn-outline-primary" href="{{ route('room.edit',$room->id) }}">
                                                    <i class="fas fa-pencil-alt fa-fw"></i>
                                                </a>
{{--                                            @endcan--}}

{{--                                            @can('view',$post)--}}
                                                <button form="deletePost{{$room->id}}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-trash-alt fa-fw"></i>
                                                </button>
{{--                                            @endcan--}}

                                        </div>
                                        <form action="{{ route('room.destroy',$room->id) }}" id="deletePost{{ $room->id }}" method="post" class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>


                                    </td>

                                    <td>
                                        {{$room->created_at}}
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6">There is no Post</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>
@stop
