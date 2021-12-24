<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::paginate(5);
        return view('directors.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directors.create');
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $director = $request->all();

        if($image = $request->file('image')){
            $saveImage = 'images/';
            $directorImage = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($saveImage, $directorImage);
            $director['image'] = "$directorImage";
        }

        Director::create($director);
        return redirect()->route('directors.index');
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
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthday' => 'required'
        ]);

        $dir = $request->all();

        if($image = $request->file('image')){
            $saveImage = 'images/';
            $directorImage = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($saveImage, $directorImage);
            $dir['image'] = "$directorImage";
        }else{
            unset($director['image']);
        }

        $director->update($dir);
        return redirect()->route('directors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('directors.index');
    }
}
