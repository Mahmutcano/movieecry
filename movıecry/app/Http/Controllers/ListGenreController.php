<?php

namespace App\Http\Controllers;

use App\Models\Genre;

use Illuminate\Http\Request;

class ListGenreController extends Controller
{
    public function gindex(){
        $genres = Genre::orderBy('updated_at', 'DESC')->paginate(6);
        return view('search',compact('genres'));
    }

    public function gshow($name){
        $genre = Genre::where('name',$name)->first();
        return view('genre-gshow',compact('genre'));
    }
}