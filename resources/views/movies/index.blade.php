@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>

        {{-- ------------------------------End Of the Popular Movies----------- --}}

        <div class="now-playing py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie"/>
                @endforeach
            </div>
        </div>
        

        <!-- <div class="upcoming-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Upcoming Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($upComingMovies as $movies)
                    <x-movie-card :movie="$movies"/>
                @endforeach
            </div>
        </div> -->
    </div>
@endsection
