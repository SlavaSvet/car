@extends('layouts.public')


@section('content')
<div class="container mx-auto flex items-center justify-center flex-wrap pt-4 pb-12">
  <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-6">
    @if(session('error'))
      <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
        {{ session('error') }}
      </div>
    @endif
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Rental Form</h2>
    <form action="{{ route('cars.rental.store', $car->id) }}" method="POST">
      @csrf
      <!-- Start Date -->
      <div class="mb-4">
          <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
          <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('start_date')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
          @enderror
      </div>

      <!-- End Date -->
      <div class="mb-4">
          <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
          <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('end_date')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
          @enderror
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
      </div>
    </form>
  </div>
</div>

@endsection