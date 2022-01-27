<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('welcome',compact('rooms'));
    }

    public function show($slug)
    {

        $room = Room::where('slug',$slug)->first();
//        return $room;
        return view('detail',compact('room'));
    }

}
