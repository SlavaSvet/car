@extends('layouts.public')

@section('content')
    <section class="py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white pb-6">My Favorites</h1>

            @if($favorites->isEmpty())
                <p class="text-lg text-gray-600 dark:text-gray-400">You have no favorite cars yet.</p>
            @else
                <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($favorites as $favorite)
                        <div class="group rounded-2xl border border-gray-300 bg-white p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 dark:border-gray-700 dark:bg-gray-800 dark:hover:shadow-2xl">
                            <div class="h-56 w-full rounded-xl overflow-hidden mb-4">
                                <a href="{{ route('cars.show', $favorite->car->id) }}">
                                    <img class="w-full h-full object-cover rounded-xl transition-all duration-500 ease-in-out transform group-hover:scale-110" src="{{ $favorite->car->getImage()?->getUrl() }}">
                                </a>
                            </div>
                            <div class="pt-4">
                                <a href="{{ route('cars.show', $favorite->car->id) }}" class="text-2xl font-semibold text-gray-800 dark:text-white hover:text-blue-600 transition-all duration-300 ease-in-out">{{ $favorite->car->name }}</a>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $favorite->car->model->name }} ({{ $favorite->car->model->make->name }})</p>
                                <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">Price: £{{ number_format($favorite->car->price, 2) }}</p>
                            </div>
                            <!-- Button to Remove from Favorites -->
                            <form action="{{ route('favorites.remove', $favorite->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center justify-center gap-2 text-sm py-2 px-4 bg-transparent text-red-600 border border-red-600 rounded-full hover:bg-red-600 hover:text-white transition-all duration-300 ease-in-out">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0l-3 3m3-3l-3-3" />
                                    </svg>
                                    Remove from favorites
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
