<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>


        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

        <style>
             [x-cloak] {
                display: none !important;
            }
            .work-sans {
                font-family: 'Work Sans', sans-serif;
            }

            #menu-toggle:checked + #menu {
                display: block;
            }

            .hover\:grow {
                transition: all 0.3s;
                transform: scale(1);
            }

            .hover\:grow:hover {
                transform: scale(1.02);
            }

            .carousel-open:checked + .carousel-item {
                position: static;
                opacity: 100;
            }

            .carousel-item {
                -webkit-transition: opacity 0.6s ease-out;
                transition: opacity 0.6s ease-out;
            }

            #carousel-1:checked ~ .control-1,
            #carousel-2:checked ~ .control-2,
            #carousel-3:checked ~ .control-3 {
                display: block;
            }

            .carousel-indicators {
                list-style: none;
                margin: 0;
                padding: 0;
                position: absolute;
                bottom: 2%;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 10;
            }

            #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
                color: #000;
                /*Set to match the Tailwind colour you want the active one to be */
            }

        </style>


        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />


    </head>

    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
            <!--Nav-->
            <nav id="header" class="bg-white shadow-md w-full z-30 top-0">
                <div class="container mx-auto flex flex-wrap items-center justify-between py-4 px-6">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center text-gray-800 font-bold text-xl no-underline hover:no-underline">
                            <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                            </svg>
                            Car Rent
                        </a>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <div class="md:hidden">
                        <button id="menu-toggle" class="focus:outline-none">
                            <svg class="fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M3 6h18v2H3zM3 12h18v2H3zM3 18h18v2H3z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Links -->
                    <div id="menu" class="hidden md:flex md:items-center w-full md:w-auto">
                        <ul class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 text-gray-700 text-lg">
                            <li><a href="{{ route('home') }}" class="hover:text-blue-500 transition-colors duration-200">Shop</a></li>
                            <li><a href="#" class="hover:text-blue-500 transition-colors duration-200">About</a></li>
                        </ul>
                    </div>

                    <!-- Authentication Links -->
                    <div class="flex items-center space-x-4">
                        @if(auth()->check())
                            <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-500 transition-colors duration-200">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                                </svg>
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-gray-800 hover:text-red-500 transition-colors duration-200">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h6v-2H4V5h6V3zm10.59 9l-4.3-4.29 1.42-1.42L23 12l-5.29 5.29-1.42-1.42L20.59 13H9v-2h11.59z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 transition-colors duration-200">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </nav>

            <script>
                // Mobile menu toggle
                document.getElementById('menu-toggle').addEventListener('click', function () {
                    const menu = document.getElementById('menu');
                    menu.classList.toggle('hidden');
                });
            </script>

            @yield('content')

            <footer class="bg-gradient-to-r from-gray-100 to-gray-200 py-10">
                <div class="container mx-auto px-6 sm:px-12 lg:px-20">
                    <!-- Upper Section -->
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0">
                        <!-- Logo & Tagline -->
                        <div class="flex flex-col items-center lg:items-start">
                            <a href="https://learnwithsumit.com/" class="text-2xl font-bold text-gray-800 tracking-wide hover:text-blue-600 transition-colors">
                                Learn with Sumit
                            </a>
                            <p class="mt-2 text-gray-600 text-sm text-center lg:text-left">
                                Empowering developers to build great things.
                            </p>
                        </div>

                        <!-- Navigation Links -->
                        <div class="flex space-x-8 text-sm font-medium text-gray-600">
                            <a href="https://learnwithsumit.com/privacy-policy" class="hover:text-blue-500 transition-colors">Privacy Policy</a>
                            <a href="https://learnwithsumit.com/terms" class="hover:text-blue-500 transition-colors">Terms</a>
                            <a href="https://learnwithsumit.com/contact" class="hover:text-blue-500 transition-colors">Contact</a>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-300 my-6"></div>

                    <!-- Bottom Section -->
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <!-- Copyright -->
                        <p class="text-sm text-gray-500 text-center md:text-left">
                            © 2024 <a href="https://learnwithsumit.com/" class="font-semibold text-blue-500 hover:text-blue-700 transition-colors">Learn with Sumit</a>. All rights reserved.
                        </p>

                        <!-- Social Icons -->
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M22.675 0H1.325C.593 0 0 .593 0 1.326v21.348C0 23.406.593 24 1.325 24h21.351C23.406 24 24 23.406 24 22.674V1.326C24 .594 23.406 0 22.675 0zM7.191 19.744H3.897V9.047h3.294v10.697zm-1.647-12.12a1.909 1.909 0 110-3.818 1.909 1.909 0 010 3.818zm14.43 12.12h-3.294v-5.63c0-1.342-.028-3.067-1.87-3.067-1.874 0-2.161 1.462-2.161 2.973v5.724h-3.292V9.047h3.161v1.462h.045c.44-.83 1.515-1.705 3.122-1.705 3.338 0 3.954 2.2 3.954 5.063v5.877z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M24 4.56v15.09c0 .97-.78 1.75-1.75 1.75H1.75C.78 21.4 0 20.63 0 19.65V4.56C0 3.59.78 2.8 1.75 2.8h20.5C23.22 2.8 24 3.58 24 4.56zM8.29 17.17h2.49v-5.95H8.29v5.95zm1.25-6.94c.78 0 1.41-.64 1.41-1.42s-.63-1.41-1.41-1.41-1.42.63-1.42 1.41.64 1.42 1.42 1.42zm9.11 6.94h2.5v-3.36c0-.8-.29-1.35-.85-1.35-.47 0-.71.32-.83.63-.05.14-.07.32-.07.5v3.58zm-2.5-5.96h2.36c.07-.46.11-.9.11-1.35 0-2.76-2.24-5-5-5s-5 2.24-5 5c0 .45.04.89.1 1.35H6.79c-.06-.46-.1-.9-.1-1.35 0-3.03 2.47-5.5 5.5-5.5s5.5 2.47 5.5 5.5c0 .45-.04.89-.1 1.35z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.47.68.88-.53 1.56-1.37 1.88-2.37-.82.5-1.73.85-2.7 1.05A4.48 4.48 0 0015.6 4c-2.48 0-4.5 2.02-4.5 4.5 0 .36.04.72.11 1.06C7.69 9.37 4.07 7.51 1.64 4.6c-.4.7-.63 1.52-.63 2.38 0 1.65.84 3.11 2.11 3.97-.78-.02-1.51-.24-2.15-.6v.06c0 2.31 1.64 4.23 3.82 4.66-.4.1-.81.16-1.23.16-.3 0-.6-.03-.89-.09.6 1.86 2.33 3.22 4.39 3.26-1.61 1.26-3.65 2-5.86 2-.38 0-.75-.02-1.12-.07 2.08 1.34 4.56 2.12 7.21 2.12 8.65 0 13.4-7.18 13.4-13.4 0-.21 0-.43-.02-.64.92-.67 1.72-1.51 2.35-2.47z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>

            @vite('resources/js/app.js')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>


    </body>
</html>
