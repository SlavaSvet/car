@extends('layouts.public')


@section('content')

<div class="carousel relative container mx-auto" style="max-width:1600px;">
  <div class="carousel-inner relative overflow-hidden w-full">
      <!--Slide 1-->
      <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
      <div class="carousel-item absolute opacity-0" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{ asset('images/banner/banner1.jpg') }}')">

          </div>
      </div>

      <!--Slide 2-->
      <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
      <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{ asset('images/banner/banner2.jpg') }}')">
          </div>
      </div>

      <!--Slide 3-->
      <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
      <div class="carousel-item absolute opacity-0" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('{{ asset('images/banner/banner3.jpg') }}')">


          </div>
      </div>

      <!-- Add additional indicators for each slide-->
      <ol class="carousel-indicators">
          <li class="inline-block mr-3">
              <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
          </li>
          <li class="inline-block mr-3">
              <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
          </li>
          <li class="inline-block mr-3">
              <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
          </li>
      </ol>

  </div>
</div>

<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="flex gap-4 p-4 bg-gray-50 rounded-lg shadow-lg dark:bg-gray-800 mb-4">
            <!-- Filter by Make -->
            <div class="relative">
                <button id="dropdownMake" data-dropdown-toggle="dropdown-2"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Filter by Make
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown-2" class="absolute hidden w-56 p-3 mt-2 bg-white rounded-lg shadow-xl dark:bg-gray-700 filter-dropdown z-20">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Make</h6>
                    <ul class="space-y-2 text-sm">
                        @foreach($makes as $make)
                            <li class="flex items-center">
                                <input id="mk-{{ $make->id }}" type="checkbox" value=""
                                       {{ in_array($make->id, $selectedMk ?? []) ? 'checked' : '' }}
                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-green-600 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-green-600" />
                                <label for="mk-{{ $make->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $make->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Filter by Model -->
            <div class="relative">
                <button id="dropdownModel" data-dropdown-toggle="dropdown-3"
                        class="text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Filter by Model
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown-3" class="absolute hidden w-56 p-3 mt-2 bg-white rounded-lg shadow-xl dark:bg-gray-700 filter-dropdown z-20">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Model</h6>
                    <ul class="space-y-2 text-sm">
                        @foreach($models as $model)
                            <li class="flex items-center">
                                <input id="md-{{ $model->id }}" type="checkbox" value=""
                                       {{ in_array($model->id, $selectedMd ?? []) ? 'checked' : '' }}
                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-yellow-600 focus:ring-yellow-500 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-yellow-600" />
                                <label for="md-{{ $model->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $model->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Filter by Type Vehicle -->
            <div class="relative">
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-4"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Filter by Type Vehicle
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown-4" class="absolute hidden w-56 p-3 mt-2 bg-white rounded-lg shadow-xl dark:bg-gray-700 filter-dropdown z-20">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Type Vehicle</h6>
                    <ul class="space-y-2 text-sm">
                        @foreach($typeVehicles as $typeVehicle)
                            <li class="flex items-center">
                                <input id="vh-{{ $typeVehicle->id }}" type="checkbox" value=""
                                       {{ in_array($typeVehicle->id, $selectedVh ?? []) ? 'checked' : '' }}
                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600" />
                                <label for="vh-{{ $typeVehicle->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $typeVehicle->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="relative inline-block">
                <select id="sort-year"
                        class="sort-select-year text-gray-800 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 font-medium rounded-lg text-sm px-4 py-3 shadow-sm transition-all duration-300 ease-in-out hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <option value="" class="text-gray-500" {{ empty($selectedYear) ? 'selected' : '' }}>Sort by Year</option>
                    <option value="asc" {{ $selectedYear === 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $selectedYear === 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>

            <!-- Sorting by Price -->
            <div class="relative inline-block">
                <select id="sort-price"
                        class="sort-select-price text-gray-800 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 font-medium rounded-lg text-sm px-4 py-3 shadow-sm transition-all duration-300 ease-in-out hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <option value="" class="text-gray-500" {{ empty($selectedPrice) ? 'selected' : '' }}>Sort by Price</option>
                    <option value="asc" {{ $selectedPrice === 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $selectedPrice === 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>

            <!-- Reset Filters Button -->
            <div>
                <button id="reset-filters" data-dropdown-toggle="dropdown-1"
                        style="background-color: rgb(100 120 235 / var(--tw-bg-opacity, 1)) !important;"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">
                    Reset filters
                </button>
            </div>
        </div>

        @if($cars->isEmpty())
            <p class="p-6 text-3xl text-center text-gray-700 font-semibold">No cars available at the moment.</p>
        @else
            <div class="mb-12 grid gap-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                @foreach($cars as $car)
                    <div class="group relative rounded-3xl border border-gray-200 bg-gradient-to-r from-white to-gray-50 p-8 shadow-xl hover:shadow-2xl transition-all duration-500 ease-in-out">

                        <!-- Car Image Section -->
                        <div class="h-72 w-full rounded-3xl overflow-hidden bg-gradient-to-r from-gray-100 to-gray-300 group-hover:opacity-90 transition-opacity duration-300 ease-in-out">
                            <a href="{{ route('cars.show', $car->id) }}">
                                <img src="{{ $car->getImage()?->getUrl() }}" class="w-full h-full object-cover rounded-3xl group-hover:scale-105 transition-all duration-300 ease-in-out">
                            </a>
                        </div>

                        <div class="pt-2">
                            <div class="flex items-center justify-between gap-4 pt-4">
                                @if(auth()->user() && auth()->user()->favorites->contains('car_id', $car->id))
                                        <span class="bg-red-100 text-red-800 text-xs font-medium rounded-full px-4 py-2">
                                            In Favorites
                                        </span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium rounded-full px-4 py-2">
                                        Add to Favorites
                                    </span>
                                @endif

                                <div class="flex items-center gap-2">
                                    <form action="{{ route('favorites.toggle', $car->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="rounded-lg p-2 text-gray-500 hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out">
                                            @if(auth()->user() && auth()->user()->favorites->contains('car_id', $car->id))
                                                <svg class="h-5 w-5 fill-red-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                </svg>
                                            @else
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>


                            <!-- Car Name -->
                            <a href="{{ route('cars.show', $car->id) }}" class="text-3xl font-semibold text-gray-800 mt-3 hover:text-gray-600 transition-all duration-300 ease-in-out">
                                {{ $car->name }}
                            </a>

                            <!-- Car Details -->
                            <ul class="mt-4 text-sm text-gray-600 space-y-2">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p>Make: {{ $car->model->make->name }}</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p>Model: {{ $car->model->name }}</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p>Vehicle Type: {{ $car->typeVihicle->name }}</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p>VIN: {{ $car->vin }}</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p>Year: {{ $car->year }}</p>
                                </li>
                            </ul>

                            <!-- Price and Booking Button -->
                            <div class="mt-6 flex items-center justify-between gap-6">
                                <p class="text-3xl font-semibold text-gray-900">£{{ $car->price }}</p>

                                @if(auth()->check())
                                    @if(!$car->hasActiveRentals())
                                        <a href="{{ route('cars.rental.form', $car->id) }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full px-6 py-3 text-lg shadow-xl hover:bg-gradient-to-l transition-all duration-500 ease-in-out">
                                            Book Now
                                        </a>
                                    @else
                                        <div class="center relative inline-block select-none whitespace-nowrap rounded-lg bg-green-500 py-2 px-3.5 align-baseline font-sans text-xs font-bold uppercase leading-none text-white">
                                            <div class="mt-px">has active rental</div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $cars->links() }}
        @endif

    </div>
</section>
<section class="bg-white py-8">

  <div class="container py-8 px-6 mx-auto">

      <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
About
</a>

      <p class="mt-8 mb-8">This template is inspired by the stunning nordic minimalist design - in particular:
          <br>
          <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy Theme</a>
          <a class="text-gray-800 underline hover:text-gray-900" href="https://nordicmade.com/">https://nordicmade.com/</a>
          <a class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a>
      </p>

      <p class="mb-8">Our company offers a convenient and reliable car rental service for all your needs. We provide a wide selection of modern vehicles, ranging from economical to premium models, perfectly suited for business trips, family vacations, or special occasions. All our cars undergo regular maintenance, ensuring safety and comfort on the road. We value your time, so the rental process is quick and hassle-free, with flexible options to match your budget. Our clients benefit from 24/7 support and a personalized approach. Discover the freedom of travel with our company — your trusted partner on the road!</p>

  </div>

</section>

<script>
    ['vh', 'mk', 'md'].forEach(function (param) {
        document.querySelectorAll(`[id^="${param}-"]`).forEach(function (element) {
            element.addEventListener('click', function () {
                const idValue = element.id.slice(param.length + 1);
                const currentUrl = new URL(window.location.href);
                let paramValues = currentUrl.searchParams.get(param);
                let paramArray = paramValues ? paramValues.split(',') : [];

                if (paramArray.includes(idValue)) {
                    paramArray = paramArray.filter(value => value !== idValue);
                } else {
                    paramArray.push(idValue);
                }

                if (paramArray.length > 0) {
                    currentUrl.searchParams.set(param, paramArray.join(','));
                } else {
                    currentUrl.searchParams.delete(param);
                }

                window.location.href = currentUrl.toString();
            });
        });
    });

    document.querySelector(`#reset-filters`).addEventListener('click', function () {
        const currentUrl = new URL(window.location.href);
        window.location.href = currentUrl.origin + currentUrl.pathname;
    });

    document.querySelector("#sort-year").addEventListener('change', function () {
        const currentUrl = new URL(window.location.href);
        const sortValue = this.value;
        if (sortValue) {
            currentUrl.searchParams.set('year', sortValue);
        } else {
            currentUrl.searchParams.delete('year');
        }
        window.location.href = currentUrl.toString();
    });

    document.querySelector("#sort-price").addEventListener('change', function () {
        const currentUrl = new URL(window.location.href);
        const sortValue = this.value;
        if (sortValue) {
            currentUrl.searchParams.set('price', sortValue);
        } else {
            currentUrl.searchParams.delete('price');
        }
        window.location.href = currentUrl.toString();
    });
</script>
<style>
    .filter-dropdown {
        max-height: 500px;
        overflow-y: auto;
    }

    /* Стили для селекта сортировки по году */
    .sort-select-year {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        padding-right: 30px; /* Чтобы было место для стрелки */
        background-color: white;
        border: 1px solid #ccc;
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .sort-select-year:focus {
        outline: none;
        border-color: #4B5563;
    }

    .sort-select-year option {
        color: #333;
    }

    /* Стрелка для сортировки по году */
    .sort-select-year::-ms-expand {
        display: none;
    }

    .sort-select-year option[value="asc"] svg,
    .sort-select-year option[value="desc"] svg {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Стили для селекта сортировки по цене */
    .sort-select-price {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        padding-right: 30px; /* Чтобы было место для стрелки */
        background-color: white;
        border: 1px solid #ccc;
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .sort-select-price:focus {
        outline: none;
        border-color: #4B5563;
    }

    .sort-select-price option {
        color: #333;
    }

    /* Стрелка для сортировки по цене */
    .sort-select-price::-ms-expand {
        display: none;
    }

    .sort-select-price option[value="asc"] svg,
    .sort-select-price option[value="desc"] svg {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Стили стрелок (по умолчанию они направлены вниз) */
    .sort-select-year option[value="asc"] svg,
    .sort-select-price option[value="asc"] svg {
        transform: rotate(180deg); /* Повернем стрелку вверх для Ascending */
    }

    .sort-select-year option[value="desc"] svg,
    .sort-select-price option[value="desc"] svg {
        transform: rotate(0deg); /* Стрелка вниз для Descending */
    }

</style>
@endsection


