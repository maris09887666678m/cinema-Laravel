@extends('layouts.app')

@section('content')
    <section id="booking-lists" class="p-6 max-w-screen-lg mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center">
            Your Bookings
        </h1>

        @foreach ($bookings as $booking)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <x-booking-card :booking="$booking" :currentDate="$currentDate" :currentTime="$currentTime" />
                </div>
            </div>
        @endforeach

        <div class="my-6 d-flex justify-content-center">
            {{ $bookings->links() }}
        </div>
    </section>
@endsection
