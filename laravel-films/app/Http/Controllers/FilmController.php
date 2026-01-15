<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::latest()->get();
        return view('films.index', compact('films'));
    }
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'genre' => 'required',
        'year' => 'required|integer',
        'description' => 'nullable',
        'actors' => 'nullable',
        'image' => 'nullable|url',
    ]);

    Film::create($request->only(
        'title',
        'genre',
        'year',
        'description',
        'actors',
        'image'
    ));

    return redirect()->route('films.index');
}


    public function update(Film $film)
    {
        $film->update(['watched' => !$film->watched]);
        return back();
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return back();
    }
}
