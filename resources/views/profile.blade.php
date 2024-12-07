@extends('layouts.public')


@section('content')
<div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

  @foreach($rentals as $rental) 
    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
      <a href="{{ route('cars.show', $rental->car->id) }}">
          <img class="hover:grow hover:shadow-lg" src="{{ $rental->car->getImage()?->getUrl() }}">
          <div class="pt-3 flex items-center justify-between">
              <p class="">{{ $rental->car->name }}</p>
            
          </div>
          <p class="pt-1 text-gray-900">Period: {{ $rental->start_date->format('M d, Y') }} - {{ $rental->end_date->format('M d, Y') }}</p>
          <p class="pt-1 text-gray-900">Total Cost: £{{ $rental->total_cost }}</p>
          <p class="pt-1 text-gray-900">Status: <strong>{{ $rental->status }}</strong></p>
      </a>
    </div>
  @endforeach

</div>

@endsection