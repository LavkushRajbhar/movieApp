@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Popular Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $show)
                    <x-tv-card :show="$show"/>
                @endforeach
            </div>
        </div>
        {{-- ------------------------------End Of the Popular Tv----------- --}}
        <div class="top-rated-shows py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                 @foreach ($topRatedTv as $show)
                    <x-tv-card :show="$show"/>
                @endforeach
            </div>
        </div>
        <!-- <div class="top-rated-shows py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Airing Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                 @foreach ($airingTv as $show)
                    <x-tv-card :show="$show"/>
                @endforeach
            </div>
        </div> -->
    </div>
@endsection
