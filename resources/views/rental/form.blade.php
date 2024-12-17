@extends('layouts.public')


@section('content')
    <div class="container mx-auto flex items-center justify-center pt-12 pb-20">
        <div class="w-full max-w-3xl bg-white rounded-3xl p-12 shadow-xl transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-2xl">
            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
            <h2 class="text-5xl font-extrabold text-gray-800 mb-10 text-center tracking-wide">Book Your Car Now</h2>
            <form action="{{ route('cars.rental.store', $car->id) }}" method="POST" class="space-y-10">
                @csrf
                <!-- Start Date -->
                <div class="mb-10">
                    <label for="start_date" class="block text-gray-700 font-semibold text-lg mb-3">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                           class="w-full px-8 py-5 border-2 border-gray-300 rounded-3xl shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:border-blue-600 text-lg transition duration-300 ease-in-out">
                    @error('start_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div class="mb-10">
                    <label for="end_date" class="block text-gray-700 font-semibold text-lg mb-3">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                           class="w-full px-8 py-5 border-2 border-gray-300 rounded-3xl shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:border-blue-600 text-lg transition duration-300 ease-in-out">
                    @error('end_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-xl px-8 py-5 rounded-full shadow-2xl hover:bg-gradient-to-l hover:from-blue-700 hover:to-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-600 transition-all duration-300 ease-in-out">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


