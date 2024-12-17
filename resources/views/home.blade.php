@extends('layouts.public')


@section('content')
<div class="carousel relative container mx-auto" style="max-width:1600px;">
  <div class="carousel-inner relative overflow-hidden w-full">
      <!--Slide 1-->
      <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
      <div class="carousel-item absolute opacity-0" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{ asset('images/banner/banner1.jpg') }}')">

              <div class="container mx-auto">
                  <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                      <p class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</p>
                      <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                  </div>
              </div>

          </div>
      </div>
      <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
      <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

      <!--Slide 2-->
      <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
      <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{ asset('images/banner/banner2.jpg') }}')">

              <div class="container mx-auto">
                  <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                      <p class="text-black text-2xl my-4">Real Bamboo Wall Clock</p>
                      <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                  </div>
              </div>

          </div>
      </div>
      <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
      <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

      <!--Slide 3-->
      <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
      <div class="carousel-item absolute opacity-0" style="height:50vh;">
          <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('{{ asset('images/banner/banner3.jpg') }}')">

              <div class="container mx-auto">
                  <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                      <p class="text-black text-2xl my-4">Brown and blue hardbound book</p>
                      <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                  </div>
              </div>

          </div>
      </div>
      <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
      <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

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

<!--

Alternatively if you want to just have a single hero

<section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right" style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

<div class="container mx-auto">

<div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
<h1 class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
<a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">products</a>

</div>

</div>

</section>

-->


<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
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
@endsection
