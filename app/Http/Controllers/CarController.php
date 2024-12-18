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
        $typeVehicleIds = explode(',', $request->vh);
        $makeIds = explode(',', $request->mk);
        $modelIds = explode(',', $request->md);

        $cars = Car::query()->with(['media', 'model.make', 'typeVihicle', 'reviews']);

        if ($request->has('vh') && $request->vh) {
            $cars->whereIn('type_vihicle_id', $typeVehicleIds);
        }

        if ($request->has('mk') && $request->mk) {
            $cars->whereHas('model', function ($query) use ($makeIds) {
                $query->whereIn('make_id', $makeIds);
            });
        }

        if ($request->has('md') && $request->md) {
            $cars->whereIn('model_id', $modelIds);
        }

        if ($request->has('year') && in_array($request->year, ['asc', 'desc'])) {
            $cars->orderBy('year', $request->year);
        }

        if ($request->has('price') && in_array($request->price, ['asc', 'desc'])) {
            $cars->orderBy('price', $request->price);
        }

        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $cars->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $cars->where('price', '<=', $request->max_price);
        }

        $typeVehicles = TypeVihicle::cursor();
        $makes = Make::cursor();
        $models = Model::cursor();

        $cars = $cars->paginate();

        return view('home', compact('cars', 'typeVehicles', 'makes', 'models'))
            ->with([
                'selectedVh' => $typeVehicleIds,
                'selectedMk' => $makeIds,
                'selectedMd' => $modelIds,
                'selectedYear' => $request->year,
                'selectedPrice' => $request->price,
                'selectedMinPrice' => $request->min_price,
                'selectedMaxPrice' => $request->max_price,
            ]);
    }

    public function show(Car $car)
    {
        return view('show', compact('car'));
    }
}
