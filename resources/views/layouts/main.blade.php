<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Movie App</title>
    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex item-center flex-col md:flex-row">
                <li>
                    <a href="{{ route('movies.index')}}">
                        <img src="{{ asset('img/logo2.jpg') }}" alt="logo" class="w-20">
                    </a>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index')}}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index')}}" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index')}}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex items-center flex-col md:flex-row">
                <!-- <div class="relative mt-3 md:mt-0">
                    <input type="text" class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">
                    </div>
                </div> -->
                <livewire:search-dropdown></livewire:search-dropdown>

                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="http://">
                        <img src="{{ asset('img/avatar2.jpg') }}" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield("content")

    <livewire:scripts>

    @yield("scripts")
</body>
</html>
