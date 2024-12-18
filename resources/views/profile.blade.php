@extends('layouts.public')

@section('content')
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white pb-6">My Rentals</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-800">
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="mb-8 grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($rentals as $rental)
                    <div class="group rounded-2xl border border-gray-300 bg-white p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 dark:border-gray-700 dark:bg-gray-800 dark:hover:shadow-2xl">
                        <div class="h-56 w-full rounded-xl overflow-hidden">
                            <a href="{{ route('cars.show', $rental->car->id) }}">
                                <img class="w-full h-full object-cover rounded-xl transition-all duration-500 ease-in-out transform group-hover:scale-110" src="{{ $rental->car->getImage()?->getUrl() }}">
                            </a>
                        </div>
                        <div class="pt-6">
                            <a href="{{ route('cars.show', $rental->car->id) }}" class="text-xl font-semibold leading-tight text-gray-800 dark:text-white hover:text-blue-600 transition-all duration-300 ease-in-out">{{ $rental->car->name }}</a>

                            <ul class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-400">
                                <li class="flex items-center gap-3">
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Car: {{ $rental->car->name }} ({{$rental->car->model->name}}, {{$rental->car->model->make->name}})</p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Period: {{ $rental->start_date->format('M d, Y') }} - {{ $rental->end_date->format('M d, Y') }}</p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Total Cost: £{{ $rental->total_cost }}</p>
                                </li>
                            </ul>

                            <!-- Status Label -->
                            <div class="mt-4">
                                @if($rental->status === \App\Enums\RentalStatus::ACTIVE->value)
                                    <span class="inline-block px-4 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Active</span>
                                    <!-- Cancel Button -->
                                    <form action="{{ route('rentals.cancel', $rental->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-pink-600 rounded-lg hover:from-red-600 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Cancel
                                        </button>
                                    </form>
                                @elseif($rental->status === \App\Enums\RentalStatus::COMPLETED->value)
                                    <span class="inline-block px-4 py-1 text-sm font-semibold text-blue-800 bg-blue-200 rounded-full">Completed</span>
                                @elseif($rental->status === \App\Enums\RentalStatus::CANCELLED->value)
                                    <span class="inline-block px-4 py-1 text-sm font-semibold text-red-800 bg-red-200 rounded-full">Cancelled</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $rentals->links() }}
        </div>
    </section>
@endsection



