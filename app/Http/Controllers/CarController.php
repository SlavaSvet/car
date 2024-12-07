<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::query()->with(['media', 'model.make', 'typeVihicle'])->paginate();

        return view('home', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('show', compact('car'));  
    }
}
