<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class ListMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('genres')->paginate(6);
        return view('movies', compact('movies'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie', compact('movie'));
    }

    public function genre(Genre $genre){
        $movies = $genre->movies;
        return view('genre', compact('genre','movies'));
    }

}
