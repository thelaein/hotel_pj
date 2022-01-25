<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {

//        return $request;
        $name = $request->name;
        $slug = Str::slug($name);
        $room = new Room();
        $room->name = $name;
        $room->slug = $slug;
        $room->photo = $request->photo;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->excerpt = Str::words($request->description,5);
        $room->user_id = Auth::id();

        $room->save();
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $name = $request->name;
        $slug = Str::slug($name);
        $room->name = $name;
        $room->slug = $slug;
        $room->photo = $request->photo;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->excerpt = Str::words($request->description,5);
        $room->user_id = Auth::id();

        $room->update();
        return redirect()->route('room.index')->with('status','success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('status','success deleted');
    }
}
