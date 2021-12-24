<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::paginate(5);
        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthday' => 'required',
            'biography' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $actor = $request->all();

        if($image = $request->file('image')){
            $saveImage = 'images/';
            $actorImage = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($saveImage, $actorImage);
            $actor['image'] = "$actorImage";
        }

        Actor::create($actor);
        return redirect()->route('actors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthday' => 'required',
            'biography' => 'required'
        ]);

        $act = $request->all();

        if($image = $request->file('image')){
            $saveImage = 'images/';
            $actorImage = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($saveImage, $actorImage);
            $act['image'] = "$actorImage";
        }else{
            unset($actor['image']);
        }

        $actor->update($act);
        return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actors.index');
    }
}
