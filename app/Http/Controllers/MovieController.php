<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return $this->search($request);
        }
        $movies = Movie::paginate(3);
        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', ['movie' => $movie]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre' => 'required',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $a = explode('/', $imagePath);
        $nombreImg = end($a);

        Movie::create([
            'title' => $request->title,
            'image' => $nombreImg,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
        ]);

        return redirect()->route('movies.index')->with('success', 'Película agregada exitosamente.');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;

        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($movie->image) {
                Storage::delete('public/images/' . $movie->image);
            }

            // Guardar la nueva imagen
            $imagePath = $request->file('image')->store('public/images');
            $movie->image = basename($imagePath);
        }

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Película actualizada exitosamente.');
    }


    public function search(Request $request) 
{
    $searchTerm = $request->input('search');
    $movies = Movie::where('title', 'like', '%' . $searchTerm . '%')
                   ->orWhere('genre', 'like', '%' . $searchTerm . '%')
                   ->orWhere('release_year', 'like', '%' . $searchTerm . '%')
                   ->paginate(3);
    return view('movies.index', compact('movies'));
}

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Película eliminada exitosamente.');
    }
}
