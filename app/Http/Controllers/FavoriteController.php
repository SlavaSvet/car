<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Car $car)
    {
        $user = auth()->user();

        $favorite = Favorite::where('user_id', $user->id)->where('car_id', $car->id)->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Car removed from favorites.');
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'car_id' => $car->id,
            ]);
            return back()->with('success', 'Car added to favorites.');
        }
    }

    public function index()
    {
        $favorites = auth()->user()->favorites()->with('car')->get();

        return view('favorites.index', compact('favorites'));
    }

    public function remove(Favorite $favorite)
    {
        if ($favorite->user_id !== auth()->id()) {
            return redirect()->route('favorites.index')->with('error', 'You can only remove your own favorites.');
        }

        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'Car removed from favorites.');
    }
}
