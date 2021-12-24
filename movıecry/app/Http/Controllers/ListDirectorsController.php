<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Movie;

class ListDirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::paginate();
        return view('directors', compact('directors'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Director $director)
    {
        $movies = Movie::where('director_id', $id)->get();
        $director = Director::findOrFail($id);
        return view('director', compact('director','movies'));
    }

}