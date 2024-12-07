@extends('layouts.public')


@section('content')
  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
    <div class="flex flex-wrap -mx-6">
      <!-- Image Section -->
      <div class="w-full md:w-1/2 px-6">
          <img src="{{ $car->getImage()?->getUrl() }}" alt="Car Image" class="rounded shadow-lg">
      </div>

      <!-- Car Details Section -->
      <div class="w-full md:w-1/2 px-6">
          <h2 class="text-3xl font-bold text-gray-800">{{ $car->name }}</h2>
          <p class="text-gray-600 mt-2">Make: <span class="font-semibold">{{ $car->model->make->name }}</span></p>
          <p class="text-gray-600 mt-2">Model: <span class="font-semibold">{{ $car->model->name }}</span></p>
          <p class="text-gray-600 mt-2">Vehicle Type: <span class="font-semibold">{{ $car->typeVihicle->name }}</span></p>
          <p class="text-gray-600 mt-2">Year: <span class="font-semibold">{{ $car->year }}</span></p>
          <p class="text-gray-600 mt-2">VIN: <span class="font-semibold">{{ $car->vin }}</span></p>
          <p class="text-gray-600 mt-2 text-lg font-bold">Price: £{{ $car->price }}</p>
          
          <!-- Action Button -->
          @if(auth()->check())
            <div class="mt-6">
                <a href="{{ route('cars.rental.form', $car->id) }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
                    Book Now
                </a>
            </div>
          @endif
          
      </div>
  </div>

  <!-- Additional Information -->
  <div class="mt-12">
      <h3 class="text-2xl font-bold text-gray-800">Car Description</h3>
      <p class="text-gray-600 mt-4">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet facilisis libero. Nulla varius purus nec libero fermentum, vel convallis eros interdum.
      </p>
  </div>
  </div>
@endsection