@extends('layouts.app')

@section('content')
    <!-- Movie details section -->
    <section id="movie-details" class="py-5">
        <div class="container bg-white border rounded-lg shadow-lg p-4 mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-md-4">
                    <img class="img-fluid rounded-start" src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" />
                </div>
                <div class="col-md-8">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <h5 class="display-4 mb-4 text-primary">{{ $movie->title }}</h5>
                        <div class="d-flex flex-wrap mb-3">
                            <x-movie-info :movie="$movie" />
                        </div>
                        <p class="mb-3 text-muted">{{ $movie->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Dates and showtimes list --}}
    <section id="dates-showtimes" class="py-5">
        <div class="container">
            <h2 class="text-center text-primary display-5 mb-5">
                Dates and Showtimes
            </h2>
            <div class="row g-4">
                @foreach ($movie->dates as $date)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-date-card :date="$date">
                            @foreach ($date->showtimes as $showtime)
                                <x-showtime-button :showtime="$showtime" :movie="$movie" :date="$date" :currentDate="$currentDate"
                                    :currentTime="$currentTime" />
                            @endforeach
                        </x-date-card>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

