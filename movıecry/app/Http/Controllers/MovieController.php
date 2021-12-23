<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

use App\Models\Genre;

class MovieController extends Controller
{
    public function mindex(){
        $movies = Movie::orderBy('updated_at', 'DESC')->paginate(6);
        return view('movieplay',compact('movies'));
    }

    public function mshow($mname){
        $movie = Movie::where('mname',$mname)->first();
        return view('movie-mshow',compact('movie'));
    }
    public function genre(Genre $genre){
        $movies = $genre->movies;
        return view('genre', compact('genre','movies'));
    }
}