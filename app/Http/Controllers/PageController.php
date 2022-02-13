<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Feature;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
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
//        $feature = Feature::where('slug',$slug)->first();
//        return $room;
        return view('detail',compact('room'));
    }

    public function book($id){


//        return "aa";
        $room = Room::find($id);


        $room = Room::where('id',$id)->first();

        return view('book',compact('room'));
    }


    public function bookStore(Request $request)
    {
//        return $request;
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|unique:users,email',
            'phone'=>'required',
            'check_in'=>'required',
            'check_out'=>'required',
        ]);
        $book = new Book();

        $book->name = $request->name;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->room_id=$request->room_id;
        $book->check_in = $request->check_in;
        $book->check_out = $request->check_out;
        $book->save();
        return redirect()->route('index')->with('status','Booking success');

    public function booking(Request $request){
//        return $request;
       $book = new Book();
       $book->room_id = $request->room_id;
       $book->name = $request->name;
       $book->email = $request->email;
       $book->phone = $request->phone;
       $book->check_in = $request->check_in;
       $book->check_out = $request->check_out;
       $book->save();
       return redirect()->route('index');

    }


}
