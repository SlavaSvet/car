<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Make;
use App\Models\Model;
use App\Models\TypeVihicle;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CarController extends Controller
{
    public function index(Request $request)
    {

        $cars = Car::query()->with(['media', 'model.make', 'typeVihicle']);

        if ($request->has('vh') && $request->vh) {
            $cars->whereIn('type_vihicle_id', Arr::wrap($request->vh));
        }

        $typeVihicles = TypeVihicle::all();
        $makes = Make::all();
        $models = Model::all();

        $cars = $cars->paginate();

        return view('home', compact('cars', 'typeVihicles', 'makes', 'models'));
    }

    public function show(Car $car)
    {
        return view('show', compact('car'));
    }
}
