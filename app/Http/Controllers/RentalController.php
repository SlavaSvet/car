<?php

namespace App\Http\Controllers;

use App\Enums\RentalStatus;
use App\Http\Requests\RentalRequest;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function form(Car $car)
    {
        return view('rental.form', compact('car'));
    }

    public function store(Car $car, RentalRequest $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $existingRental = Rental::where('car_id', $car->id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($query) use ($startDate, $endDate) {
                          $query->where('start_date', '<', $startDate)
                                ->where('end_date', '>', $endDate);
                      });
            })
            ->exists();
    
        if ($existingRental) {
            return redirect()->back()->withInput()->with('error', 'The selected date range is already booked for this car.');
        }

        $rental = Rental::create([
            'car_id' => $car->id,
            'user_id' => auth()->user()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_cost' => $car->price,
            'status' => RentalStatus::ACTIVE->value,
        ]);
        
        return redirect()->route('dashboard')->with('success','You have rented a car');
    }
}
