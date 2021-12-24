<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\User;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $movies = Movie::with('genres')->paginate(5);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = Actor::all();
        $genres = Genre::all();
        $directors = Director::all();
        return view('movies.create', compact('directors', 'genres', 'actors'));
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
            'mov_title' => 'required',
            'video' => 'required | mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:9000000',
            'mov_rate' => 'required',
            'mov_lınk' => 'required | mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:9000000',
            'mov_date' => 'required',
            'mov_old' => 'required',
            'mov_sesson' => 'required',
            'desc' => 'required',
            'mov_startime' => 'required',
            'mov_endtime' => 'required',
            'director_id' => 'required',
            'poster' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $movie = $request->all();

        if($poster = $request->file('poster')){
            $savePoster = 'images/';
            $moviePoster = date('YmdHis').".". $poster->getClientOriginalExtension();
            $poster->move($savePoster, $moviePoster);
            $movie['poster'] = "$moviePoster";
        }

        if($video = $request->file('video')){
            $saveVideo = 'videos/';
            $movieVideo = date('YmdHis').".". $video->getClientOriginalExtension();
            $video->move($saveVideo, $movieVideo);
            $movie['video'] = "$movieVideo";
        }
        if($mov_lınk = $request->file('mov_lınk')){
            $saveFilm = 'videos/';
            $movieFilm = date('YmdHis').".". $mov_lınk->getClientOriginalExtension();
            $mov_lınk->move($saveFilm, $movieFilm);
            $movie['mov_lınk'] = "$movieFilm";
        }

        $mov = Movie::create($movie);
        $genres = $request->genres;
        $actors = $request->actors;
        $mov_title = $request->mov_title;


        if ($request->genres) {
            $mov->genres()->attach($genres);
        }
        if ($request->actors) {
            $mov->actors()->attach($actors);
        }
        return redirect()->route('movies.index')->with('messages', 'Created successfully!');

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
    public function edit($id)
    {
        $movies = Movie::with('genres')->get();
        foreach ($movies as $movie) {
            if ($movie->id == $id) {
                $actors = Actor::all();
                $genres = Genre::get();
                $directors = Director::all();
                return view('movies.edit', compact('directors', 'genres', 'movie', 'actors'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
         $request->validate([
            'mov_title' => 'required',
            'mov_rate' => 'required',
            'mov_date' => 'required',
            'mov_old' => 'required',
            'mov_sesson' => 'required',
            'desc' => 'required',
            'mov_startime' => 'required',
            'mov_endtime' => 'required',
            'director_id' => 'required',
        ]);

        $mov = $request->all();
        $genres = $request->genres;
        $actors = $request->actors;

        if($poster = $request->file('poster')){
            $savePoster = 'images/';
            $moviePoster = date('YmdHis').".". $poster->getClientOriginalExtension();
            $poster->move($savePoster, $moviePoster);
            $mov['poster'] = "$moviePoster";
        }else{
            unset($movie['poster']);
        }

        if($video = $request->file('video')){
            $saveVideo = 'images/';
            $movieVideo = date('YmdHis').".". $video->getClientOriginalExtension();
            $video->move($saveVideo, $movieVideo);
            $mov['video'] = "$movieVideo";
        }else{
            unset($movie['video']);
        }
        if($mov_lınk = $request->file('mov_lınk')){
            $saveFilm = 'videos/';
            $movieFilm = date('YmdHis').".". $mov_lınk->getClientOriginalExtension();
            $mov_lınk->move($saveFilm, $movieFilm);
            $mov['mov_lınk'] = "$movieFilm";
        }else{
            unset($movie['mov_lınk']);
        }

        $movie->update($mov);


        if ($request->genres) {
            $movie->genres()->sync($genres);
        }

        if ($request->actors) {
            $movie->actors()->sync($actors);
        }

        return redirect()->route('movies.index')->with('messages', 'Update successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('messages', 'Deleted successfully!');
    }
}
