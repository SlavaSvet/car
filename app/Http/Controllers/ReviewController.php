<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $car_id)
    {
        $existingReview = Review::where('user_id', Auth::id())
            ->where('car_id', $car_id)
            ->first();

        if ($existingReview) {
            return redirect()->route('cars.show', $car_id)
                ->with('error', 'You have already left a review for this car.');
        }

        $request->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->car_id = $car_id;
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect()->route('cars.show', $car_id)->with('success', 'Your review has been added!');
    }

    public function index()
    {
        $reviews = Review::where('user_id', Auth::id())->get();
        return view('reviews.index', compact('reviews'));
    }
}
