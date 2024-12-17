@extends('layouts.public')

@section('content')
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white pb-6">My Rentals</h1>

            <!-- Heading & Filters -->
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
                                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Car: {{ $rental->car->name }}({{$rental->car->model->name}}, {{$rental->car->model->make->name}})</p>
                                </li>

                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Period: {{ $rental->start_date->format('M d, Y') }} - {{ $rental->end_date->format('M d, Y') }}</p>
                                </li>

                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="font-medium text-gray-600 dark:text-gray-400">Total Cost: £{{ $rental->total_cost }}</p>
                                </li>
                            </ul>

                            <!-- Status Label -->
                            <div class="mt-4">
                                @if($rental->status === 'active')
                                    <span class="inline-block px-4 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Active</span>
                                @elseif($rental->status === 'completed')
                                    <span class="inline-block px-4 py-1 text-sm font-semibold text-blue-800 bg-blue-200 rounded-full">Completed</span>
                                @elseif($rental->status === 'cancelled')
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

