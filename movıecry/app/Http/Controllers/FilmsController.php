<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findex()
    {
        $movies = Film::latest()->paginate(4);
        return view('films.index', compact('films'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fcreate()
    {
        $genres = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama'];

        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fstore(Request $request)
    {
        $request->validate(['title' => 'required',
            'genre' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
        }

        $data = new Film;
        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
        $data->poster = $imageName;
        $data->save();
        return redirect()->route('films.index')->with('success', 'Movie has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function fshow(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function fedit(Film $film)
    {
        $genres = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama'];
        return view('films.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function fupdate(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
            $film->poster = $imageName;
        }

        $film->title = $request->title;
        $film->genre = $request->genre;
        $film->release_year = $request->release_year;
        $film->update();
        return redirect()->route('films.index')->with('success', 'Movie has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function fdestroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Movie has been deleted successfully.');

    }
}