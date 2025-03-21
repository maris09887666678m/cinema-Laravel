@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white text-center">
            Booking Details
        </h2>
        <form action="{{ route('bookings.store', [$movie, $date, $showtime]) }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="movie" class="form-label text-gray-900 dark:text-white">
                        Movie
                    </label>
                    <input type="text" name="movie" id="movie" class="form-control" value="{{ $movie->title }}" disabled readonly>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="date" class="form-label text-gray-900 dark:text-white">
                        Date
                    </label>
                    <input type="text" name="date" id="date" class="form-control" value="{{ $date->date->format('D, j M Y') }}" disabled readonly>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="showtime" class="form-label text-gray-900 dark:text-white">
                        Showtime
                    </label>
                    <input type="text" name="showtime" id="showtime" class="form-control" value="{{ $showtime->start_time }} - {{ $showtime->end_time }}" disabled readonly>
                </div>
            </div>

            {{-- Seat Lists --}}
            <div class="mt-6">
                <h5 class="text-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                    Choose Your Seats
                </h5>
                <div class="row row-cols-4 g-3">
                    @foreach ($seats as $seat)
                        <div class="col">
                            <div class="form-check">
                                <input type="checkbox" name="seats[]" id="seat{{ $seat->id }}" value="{{ $seat->id }}"
                                    class="form-check-input" {{ $seat->isBooked($movie, $date, $showtime) ? 'disabled' : '' }}>
                                <label for="seat{{ $seat->id }}" class="form-check-label {{ $seat->isBooked($movie, $date, $showtime) ? 'text-danger' : 'text-gray-900 dark:text-white' }}">
                                    {{ $seat->seat_number }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
                SCREEN
            </div>

            @error('seats')
                <x-error-message :message="$message" />
            @enderror

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 py-2.5">
                    Book Now
                </button>
            </div>
        </form>
    </section>
@endsection
