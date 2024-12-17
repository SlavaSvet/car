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
        <div class="flex p-4 gap-2">
            <div>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-1"
                        style="background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1)) !important;"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">
                    Filter by type vehicle
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown-1" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700 filter-dropdown" >
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Type Vehicle
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        @foreach($typeVehicles as $typeVehicle)
                            <li class="flex items-center">
                                <input id="vh-{{ $typeVehicle->id }}" type="checkbox" value=""
                                       {{ in_array($typeVehicle->id, $selectedVh ?? []) ? 'checked' : '' }}

                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label  for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $typeVehicle->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-2"
                        style="background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1)) !important;"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">
                    Filter by make
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown-2" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700 filter-dropdown" >
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Make
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        @foreach($makes as $make)
                            <li class="flex items-center">
                                <input id="mk-{{ $make->id }}" type="checkbox" value=""
                                       {{ in_array($make->id, $selectedMk ?? []) ? 'checked' : '' }}

                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label  for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $make->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-3"
                        style="background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1)) !important;"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">
                    Filter by model
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown-3" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700 filter-dropdown" >
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Model
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        @foreach($models as $model)
                            <li class="flex items-center">
                                <input id="md-{{ $model->id }}" type="checkbox" value=""
                                       {{ in_array($model->id, $selectedMd ?? []) ? 'checked' : '' }}

                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label  for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $model->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
            <p class="p-4 text-3xl">No cars.</p>
        @else
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($cars as $car)
                    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="h-56 w-full">
                            <a href="{{ route('cars.show', $car->id) }}">
                                <img class="hover:grow hover:shadow-lg" src="{{ $car->getImage()?->getUrl() }}">

                            </a>
                        </div>
                        <div class="pt-6">
                            <div class="mb-4 flex items-center justify-between gap-4 pt-4">
                                <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Add to favorites </span>

                                <div class="flex items-center justify-end gap-1">



                                    <button type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only"> Add to Favorites </span>
                                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                        </svg>
                                    </button>
                                    <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                                        Add to favorites
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('cars.show', $car->id) }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $car->name }}</a>


                            <ul class="mt-2 flex items-center gap-4">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Make: {{ $car->model->make->name }}</p>
                                </li>

                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Model: {{ $car->model->name }}</p>
                                </li>

                            </ul>
                            <ul class="mt-2 flex items-center gap-4">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Vihicle: {{ $car->typeVihicle->name }}</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Vin: {{ $car->vin }}</p>
                                </li>

                            </ul>
                            <ul class="mt-2 flex items-center gap-4">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Year: {{ $car->year }}</p>
                                </li>
                            </ul>


                            <div class="mt-4 flex items-center justify-between gap-4">
                                <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">£{{ $car->price }}</p>

                                <a href="{{ route('cars.rental.form', $car->id) }}"  style="background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1)) !important;" type="button" class="inline-flex items-center rounded-lg bg-info-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-info-800 focus:outline-none focus:ring-4  focus:ring-primary-300">
                                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                    Add to cart
                                </a>
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

</script>
<style>
    .filter-dropdown {
        max-height: 500px;
        overflow-y: auto;
    }
</style>
@endsection


