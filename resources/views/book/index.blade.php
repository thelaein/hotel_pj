@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Booking List
                    </div>
                    <div class="card-body">


                        @if (session('status'))
                            <p class="alert alert-success">{{session('status')}}</p>
                        @endif


{{--                        <div class="d-flex justify-content-between">--}}
{{--                            --}}{{--                            {{$posts->appends(request()->all())->Links()}}--}}
{{--                            <form>--}}
{{--                                <div class="input-group  mb-3" >--}}
{{--                                    <input type="text" class="form-control" name="search" placeholder="Search Anything" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                                    <button class="btn btn-outline-primary" id="button-addon2">--}}
{{--                                        <i class="fas fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}



                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="w-25">Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Check_in</th>
                                <th>Check_out</th>
                                <th>Room_id</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(\App\Models\Book::all() as $book)
                                <tr>
                                    <td>{{$book->id}}</td>

                                    <td>{{$book->name}}</td>

                                    <td>{{$book->email}}</td>

                                    <td>{{$book->phone}}</td>

                                    <td>
                                        {{$book->check_in}}
                                    </td>

                                    <td>{{$book->check_out}}</td>

                                    <td>
                                            {{$book->room->id}}
                                    </td>

                                    <td>
                                        {{$book->created_at}}
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6">There is no Booking</td>
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
