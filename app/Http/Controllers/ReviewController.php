<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'movie_id' => 'required|exists:movies,id', 
    ]);

    Review::create([
        'title' => $request->title,
        'description' => $request->description,
        'rating' => $request->rating,
        'movie_id' => $request->movie_id, 
    ]);

    return redirect()->route('movies.show', $request->movie_id)->with('success', 'Reseña agregada exitosamente.');
}



    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string',
        ]);

        $review = Review::findOrFail($id);

        $review->title = $request->title;
        $review->rating = $request->rating;
        $review->description = $request->description;

        $review->save();

        return redirect()->route('movies.show', $review->movie_id)->with('success', 'Reseña actualizada exitosamente.');
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Reseña eliminada exitosamente.');
    }
}
