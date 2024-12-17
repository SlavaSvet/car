@extends('layouts.public')
@section('content')
    <div class="relative mt-10 h-screen bg-gradient-to-t from-[#fefbf7] to-[#fffef4] pt-12 sm:pt-0 mb-12 p-8 sm:p-12">

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 items-center md:gap-20 bg-gradient-to-t from-[#fefbf7] to-[#fffef4] rounded-lg shadow-lg overflow-hidden">
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
                <p class="text-3xl font-bold mt-5 text-gray-700">Price: <span class="text-2xl text-green-600">£{{ $car->price }}</span></p>

                <div class="flex gap-6 mt-8 justify-center md:justify-start">
                    @if(auth()->check() && !$car->hasActiveRentals())
                        <a href="{{ route('cars.rental.form', $car->id) }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 hover:bg-blue-700">
                            Book Now
                        </a>
                    @endif
                </div>
                @if($car->hasActiveRentals())
                    <div class="center relative inline-block select-none whitespace-nowrap rounded-lg bg-green-500 py-2 px-3.5 align-baseline font-sans text-xs font-bold uppercase leading-none text-white">
                        <div class="mt-px">has active rental</div>
                    </div>
                @endif
            </div>

            <div class="relative sm:mt-0 mt-10 px-6 sm:px-0">
                <img src="{{ $car->getImage()?->getUrl() }}" alt="Car Image" class="w-full h-full object-cover rounded-lg shadow-2xl animate__animated animate__fadeInRight animate__delay-.5s">
            </div>
        </div>
    </div>
@endsection

