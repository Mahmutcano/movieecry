<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

use Illuminate\Support\Str;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mindex()
    {
        $movies = Movie::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(12);
        return view('movies.mindex', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mcreate()
    {
        return view('movies.mcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mstore(Request $request)
    {
        $request->validate([
            'mtitle' => 'required',
            'mtime' => 'required',
            'mname' => 'required',
            'video' => 'required | mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:9000000',
            'mcategory' => 'required',
            'mold' => 'required',
            'myear' => 'required',
            'mseason' => 'required',
            'alttitle' => 'required',
            'altdesc' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $newImageMovieName = uniqid() . '-' . $request->id . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageMovieName);

        $newVideoMovieName = uniqid() . '-' . $request->id . '.' . $request->video->extension();
        $request->video->move(public_path('videos'), $newVideoMovieName);


        Movie::create([
            'mtitle' => $request->mtitle,
            'mtime' => $request->mtime,
            'mname' => $request->mname,
            'mcategory' => $request->mcategory,
            'mold' => $request->mold,
            'myear' => $request->myear,
            'mseason' => $request->mseason,
            'alttitle' => $request->alttitle,
            'altdesc' => $request->altdesc,
            'mimg' => $newImageMovieName,
            'mvideo' => $newVideoMovieName,
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
    public function medit($mname)
    {
        $movie = Movie::where('mname', $mname)->first();
        return view('movies.medit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mupdate(Request $request, $mname)
    {
        $request->validate([
            'mtitle' => 'required',
            'mname' => 'required'
        ]);

        $movie = Movie::where('mname',$mname)->first();

        if ($request->hasFile('image' , 'video')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
                'video' => 'required | mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:9000000',
            ]);
            $newImageMovieName = uniqid() . '-' . $request->id . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageMovieName);
            $movie->mimg = $newImageMovieName;


            $newVideoMovieName = uniqid() . '-' . $request->id . '.' . $request->video->extension();
            $request->video->move(public_path('videos'), $newVideoMovieName);
            $movie->mvideo = $newVideoMovieName;
        }

        $movie->title = $request->mtitle;
        $movie->mtime = $request->mtime;
        $movie->mname = $request->mname;
        $movie->user_id = auth()->user()->id;
        $movie->update();

        return redirect()->route('mindex')->with('messages', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mdestroy($id)
    {
        $movie = Movie::where('id',$id)->first();
        $movie->delete();

        return redirect()->route('mindex')->with('messages', 'Deleted successfully!');
    }
}