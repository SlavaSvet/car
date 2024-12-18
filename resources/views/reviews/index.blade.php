@extends('layouts.public')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-6">Your Reviews</h1>

        @if($reviews->isEmpty())
            <p class="text-xl text-gray-700">You haven't left any reviews yet.</p>
        @else
            <div class="space-y-4">
                @foreach($reviews as $review)
                    <div class="p-6 bg-white shadow-lg rounded-xl">
                        <!-- Car Information -->
                        <h2 class="text-xl font-semibold">
                            <a href="{{ route('cars.show', $review->car->id) }}" class="text-blue-500 hover:text-blue-700">
                                {{ $review->car->name }}
                            </a>
                        </h2>
                        <p class="text-gray-700 mt-2">Review: <span class="underline">{{ $review->review }}</span></p>

                        <!-- Car Details -->
                        <ul class="mt-4 text-sm text-gray-600">
                            <li>Make: {{ $review->car->model->make->name }}</li>
                            <li>Model: {{ $review->car->model->name }}</li>
                            <li>Year: {{ $review->car->year }}</li>
                            <li>Price: £{{ $review->car->price }}</li>
                        </ul>

                        <!-- Rating -->
                        <div class="flex items-center mt-4">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.2h7.6l-6.4 4.8 2.4 7.2-6.4-4.8-6.4 4.8 2.4-7.2-6.4-4.8h7.6L12 2z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
