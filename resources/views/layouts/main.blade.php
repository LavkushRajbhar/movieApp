<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <div class="flex items-center justify-center h-24">
                            <div class="flex items-center space-x-2 group cursor-pointer bg-white p-2 rounded">
                                <div class="w-10 h-10 bg-blue-600 rounded-lg transform rotate-45 transition-all group-hover:rotate-90 group-hover:bg-blue-700"></div>

                                <h1 class="text-3xl font-semibold tracking-tight text-gray-800 transition-colors group-hover:text-blue-600">
                                    Lavkush
                                    <span class="text-blue-600 font-normal group-hover:text-gray-800">.io</span>
                                </h1>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('tv.index')}}" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index')}}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center md:ml-4 mt-3 md:mt-0">

                <a href="#">
                    <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
        @yield('scripts')
    @livewireScripts
</body>

</html>
