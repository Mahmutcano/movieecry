<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gindex()
    {
        $genres = Genre::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(5);
        return view('genres.gindex', compact('genres'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gcreate()
    {
        return view('genres.gcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gstore(Request $request)
    {
                $request->validate([
            'name' => 'required',

        ]);



        Genre::create([
            'id' => $request->id,
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('messages', 'Created successfully!');
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
    public function eedit($id)
    {
        $genre = Genre::where('id', $id)->first();
        return view('genres.gedit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gupdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $genre = Genre::where('id',$id)->first();


        $genre->id = $request->id;
        $genre->name = $request->name;
        $genre->user_id = auth()->user()->id;
        $genre->update();

        return redirect()->route('gindex')->with('messages', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gdestroy($id)
    {
        $genre = Genre::where('id',$id)->first();
        $genre->delete();

        return redirect()->route('gindex')->with('messages', 'Deleted successfully!');
    }
}
