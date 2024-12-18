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

        if ($request->has('mk') && $request->mk) {
            $cars->whereHas('model', function ($query) use ($request) {
                $query->whereIn('make_id', Arr::wrap($request->mk));
            });
        }

        if ($request->has('md') && $request->md) {
            $cars->whereIn('model_id', Arr::wrap($request->md));
        }

        if ($request->has('year') && in_array($request->year, ['asc', 'desc'])) {
            $cars->orderBy('year', $request->year);
        }

        if ($request->has('price') && in_array($request->price, ['asc', 'desc'])) {
            $cars->orderBy('price', $request->price);
        }

        $typeVehicles = TypeVihicle::cursor();
        $makes = Make::cursor();
        $models = Model::cursor();

        $cars = $cars->paginate();

        return view('home', compact('cars', 'typeVehicles', 'makes', 'models'))
            ->with([
                'selectedVh' => Arr::wrap($request->vh),
                'selectedMk' => Arr::wrap($request->mk),
                'selectedMd' => Arr::wrap($request->md),
                'selectedYear' => $request->year,
                'selectedPrice' => $request->price,
            ]);
    }

    public function show(Car $car)
    {
        return view('show', compact('car'));
    }
}
