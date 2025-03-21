@extends('layouts.app')

@section('content')
    <section id="filter" class="w-100 p-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <x-sort />
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-end pe-3">
                    <x-search />
                </div>
            </div>
        </div>
    </section>

    <section id="movie-list" class="p-6">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($movies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>

            <div class="my-6">
                {{ $movies->appends(request()->only('sort'))->links() }}
            </div>
        </div>
    </section>
@endsection
