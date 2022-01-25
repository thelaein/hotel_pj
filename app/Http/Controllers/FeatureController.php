<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Feature::inRandomOrder()->limit(rand(1,4))->get()->pluck('id');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features=Feature::latest('id')->paginate(5);
        return view('feature.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeatureRequest $request)
    {
//        $request->validate([
//            'title'=>'required|min:3|unique:categories,title',
//        ]);

//        $title=ucfirst($request->name);
//        $feature=new Feature();
//        $feature->name=$title;
//        $feature->user_id=Auth::id();
//        $feature->save();
//        return redirect()->route('feature.create')->with('status','success');
        $feature=new Feature();
        $feature->name=$request->name;
        $feature->slug=$request->name;
        $feature->save();
        return redirect()->route('feature.create')->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        $features=Feature::latest('id')->paginate(5);

        return view('feature.edit',compact('features','feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeatureRequest  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->name=$request->name;
        $feature->slug=Str::slug($request->name);

        $feature->update();

        return redirect()->route('feature.create')->with('status','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->back();
    }
}
