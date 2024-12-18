@extends('layouts.public')
@section('content')
    <div class="mt-10 bg-gradient-to-t from-[#fefbf7] to-[#fffef4] pt-12 sm:pt-0 sm:p-12">
        <!-- Main container with car details and image -->
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 bg-gradient-to-t from-[#fefbf7] to-[#fffef4] rounded-lg shadow-lg overflow-hidden">
            <!-- Car Details Section -->
            <div class="content px-6 py-8 sm:px-12 sm:py-10 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-4">
                    <hr class="w-16 bg-orange-500 border-2 rounded-full"/>
                </div>
                <p class="text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight mt-6 sm:mt-0 text-gray-800 tracking-tight">
                    {{ $car->name }}
                </p>
                <div class="text-gray-700 mt-5 text-lg md:text-xl space-y-3">
                    <p>Make: <span class="font-semibold text-blue-600">{{ $car->model->make->name }}</span></p>
                    <p>Model: <span class="font-semibold text-blue-600">{{ $car->model->name }}</span></p>
                    <p>Vehicle Type: <span class="font-semibold text-blue-600">{{ $car->typeVihicle->name }}</span></p>
                    <p>Year: <span class="font-semibold text-blue-600">{{ $car->year }}</span></p>
                    <p>VIN: <span class="font-semibold text-blue-600">{{ $car->vin }}</span></p>
                </div>
                <p class="text-3xl font-bold mt-5 text-gray-700">Price: <span class="text-2xl text-green-600">£{{ number_format($car->price, 2) }}</span></p>

                <div class="flex gap-6 mt-8 justify-center md:justify-start">
                    @if(auth()->check() && !$car->hasActiveRentals())
                        <a href="{{ route('cars.rental.form', $car->id) }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 hover:bg-blue-700">
                            Book Now
                        </a>
                    @endif
                </div>
                @if($car->hasActiveRentals())
                    <div class="center relative inline-block select-none whitespace-nowrap rounded-lg bg-green-500 py-2 px-3.5 align-baseline font-sans text-xs font-bold uppercase leading-none text-white">
                        <div class="mt-px">Active Rental</div>
                    </div>
                @endif
            </div>

            <!-- Car Image Section -->
            <div class="relative sm:mt-0 mt-10 px-6 sm:px-0">
                <img src="{{ $car->getImage()?->getUrl() }}" alt="Car Image" class="w-full h-full object-cover rounded-lg shadow-2xl animate__animated animate__fadeInRight animate__delay-.5s">
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold mb-4">Customer Reviews</h2>

            <div class="space-y-6">
                @foreach($car->reviews as $review)
                    <div class="review p-6 border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-800 underline">{{ $review->user->name }}</h3>
                            <div class="text-yellow-500">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 17.27l4.15 2.18-1.64-5.41 4.36-3.73-5.47-.47L12 2 9.64 10.77 4.17 11.24l4.36 3.73-1.64 5.41L12 17.27z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700 mt-2">{{ $review->review }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Leave a Review Form -->
        @if(auth()->check() && !$car->reviews->where('user_id', auth()->id())->isNotEmpty())
            <div class="mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-semibold mb-4">Leave a Review</h2>
                <form action="{{ route('reviews.store', $car->id) }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-gray-700">Rating</label>
                        <select id="rating" name="rating" class="w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Choose Rating</option>
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="review" class="block text-gray-700">Review</label>
                        <textarea id="review" name="review" rows="4" class="w-full p-2 border border-gray-300 rounded-md" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-all duration-300">Submit Review</button>
                </form>
            </div>
        @else
            <p class="mt-4 text-center">You have already left a review for this car.</p>
        @endif
    </div>
@endsection


