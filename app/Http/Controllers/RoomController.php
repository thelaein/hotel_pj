<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
//       return $request;

        if (!Storage::exists('public/thumbnail')){
            Storage::makeDirectory('public/thumbnail');
        }
        //store feature image
        $featureImg=$request->file('feature_image');
        $newFeatureImageName=uniqid()."_feature_image.".$featureImg->extension();
        $featureImg->storeAs("public/feature_image",$newFeatureImageName);


        $name = $request->name;
        $slug = Str::slug($name);
        $room = new Room();
        $room->name = $name;
        $room->slug = $slug;
        $room->feature_image = $newFeatureImageName;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->excerpt = Str::words($request->description,5);
        $room->user_id = Auth::id();
        $room->save();

        $room->features()->attach($request->features);



        if ($request->hasFile('photos')){
            foreach ($request->file('photos') as $photo){
                $newName=uniqid()."_photo.".$photo->extension();
                $photo->storeAs('public/photo',$newName);


                //ပုံသေး‌အောင်ချုံ့တာ
                $img=Image::make($photo);
                $img->fit(200,200);
                $img->save("storage/thumbnail/".$newName,100);

                $photo=new Photo();
                $photo->name=$newName;
                $photo->room_id=$room->id;
                $photo->user_id=Auth::id();
                $photo->save();

            }
        }

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

        $room->features()->detach();
        $room->features()->attach($request->features);
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
        $room->features()->detach();

        $room->delete();

        return redirect()->back()->with('status','success deleted');
    }
}
