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
            <div class="flex flex-col md:flex-row items-center">

                <div class="relative mt-3 md:mt-0" x-data="searchMovies()" @click.away="isOpen = false">
                    <input
                        type="text"
                        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Search (Press '/' to focus)"
                        x-model="search"
                        @keydown.window="
                            if (event.keyCode === 191) {
                                event.preventDefault();
                                $refs.search.focus();
                            }
                        "
                        @focus="isOpen = true"
                        @keydown="isOpen = true"
                        @keydown.escape.window="isOpen = false"
                        @keydown.shift.tab="isOpen = false"
                        x-ref="search"
                        @input="searchMoviesApi"
                    >
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
                    </div>

                    <!-- Loading Spinner -->
                    <div x-show="loading" class="spinner top-0 right-0 mr-4 mt-3"></div>

                    <!-- Results Dropdown -->
                    <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show="isOpen && search.length >= 2">
                        <template x-if="results.length > 0">
                            <ul>
                                <template x-for="result in results" :key="result.id">
                                    <li class="border-b border-gray-700">
                                        <a :href="`/movies/${result.id}`" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                                            <img :src="result.poster_path ? `https://image.tmdb.org/t/p/w92/${result.poster_path}` : 'https://via.placeholder.com/50x75'" alt="poster" class="w-8">
                                            <span class="ml-4" x-text="result.title"></span>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </template>

                        <template x-if="results.length === 0 && search.length >= 2">
                            <div class="px-3 py-3">No results for "<span x-text="search"></span>"</div>
                        </template>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
        @yield('scripts')
    @livewireScripts
</body>
<script>
    function searchMovies() {
        return {
            search: '',
            results: [],
            isOpen: true,
            loading: false,
            searchMoviesApi() {
                this.loading = true;
                if (this.search.length < 2) {
                    this.results = [];
                    this.loading = false;
                    return;
                }

                const options = {
                    method: 'GET',
                    headers: {
                        accept: 'application/json',
                        Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzZjY3YTFlZThmMWI2MzcyM2Y5ZTc4MTJiZTJlYTkwNCIsIm5iZiI6MTcyNjMxMzk0Mi42MTQzMjMsInN1YiI6IjY2ODY3YjZmZTc0YzIyZjRjOGZkMGUyYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TxDxEgLCnwfwc6N2j9tSFwK_feQ5QiiAvz-N5TCWh70'
                    }
                };

                fetch(`https://api.themoviedb.org/3/search/movie?query=${this.search}`, options)
                    .then(response => response.json())
                    .then(data => {
                        this.results = data.results;
                        this.loading = false;
                    })
                    .catch(() => {
                        this.results = [];
                        this.loading = false;
                    });
            }
        }
    }
</script>

</html>
