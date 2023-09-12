<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/x-icon" href="{{ url('light_favicon.ico') }}" media="(prefers-color-scheme: light)">
        <link rel="icon" type="image/x-icon" href="{{ url('dark_favicon.ico') }}" media="(prefers-color-scheme: dark)">

        <title>X64Code - Task List Demo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
        <div class="container mx-auto p-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center py-3">X64 Code - Task List Demo App</h1>
            <div class="grid grid-cols-7 gap-2">
                <x-application-logo :cropped="true" class="col-start-3 col-span-3" />
            </div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 relative">                   
                    @auth
                        <a href="{{ url('/tasklist') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Task List</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="px-6 py-6 grid grid-cols-4 grid-rows-2 gap-x-8 gap-y-10">
                <!-- Portfolio -->
                <div class="px-2 py-2 bg-gray-100 dark:bg-gray-600 outline-2 outline-blue-500 col-start-2 rounded">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Portfolio</h2>
                    <p class="text-gray-600 dark:text-gray-400">Check out my latest projects and web development work on my portfolio website.</p>
                    <a href="https://x64code.com" class="text-blue-500 hover:underline dark:text-blue-400">Visit Portfolio</a>
                </div>

                <!-- GitHub -->
                <div class="px-2 py-2 bg-gray-100 dark:bg-gray-600 outline-2 outline-blue-500 col-start-3 rounded">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">GitHub</h2>
                    <p class="text-gray-600 dark:text-gray-400">Explore my open-source projects and contributions on GitHub.</p>
                    <a href="https://github.com/X64Code-Github" class="text-blue-500 hover:underline dark:text-blue-400">GitHub Profile</a>
                </div>

                <!-- Twitter -->
                <div class="px-2 py-2 bg-gray-100 dark:bg-gray-600 outline-2 outline-blue-500 col-start-2 rounded">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Twitter</h2>
                    <p class="text-gray-600 dark:text-gray-400">Stay updated with my web development insights and tips on Twitter.</p>
                    <a href="https://twitter.com/X64CodeMaster" class="text-blue-500 hover:underline dark:text-blue-400">Follow on Twitter</a>
                </div>

                <!-- Upwork -->
                <div class="px-2 py-2 bg-gray-100 dark:bg-gray-600 outline-2 outline-blue-500 col-start-3 rounded">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Upwork</h2>
                    <p class="text-gray-600 dark:text-gray-400">View my freelance web development services and client reviews on Upwork.</p>
                    <a href="https://www.upwork.com/freelancers/~0193a4f54707547d2b" class="text-blue-500 hover:underline dark:text-blue-400">Upwork Profile</a>
                </div>
            </div>
        </div>
    </body>
</html>
