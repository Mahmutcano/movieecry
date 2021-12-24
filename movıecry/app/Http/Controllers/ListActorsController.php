<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;

class ListActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::paginate();
        return view('actors', compact('actors'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Actor $actor, Movie $movie)
    {
        $actors = Actor::findOrFail($id)->with('actors_movies')->get();
        foreach ($actors as $actor) {
            if ($actor->id == $id) {
                return view('actor', compact('actor'));
            }
        }
    }
}