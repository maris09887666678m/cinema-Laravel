@props(['booking', 'currentDate', 'currentTime'])

<div class="card shadow-sm mb-4">
    <div class="row g-3">
        <div class="col-md-3 mb-3 mb-md-0">
            <a href="{{ route('movies.show', $booking->movie) }}">
                <img class="img-fluid rounded" src="{{ $booking->movie->poster_url }}" alt="{{ $booking->movie->title }}">
            </a>
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title text-center text-md-start mb-3">{{ $booking->movie->title }}</h5>

                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-secondary">Date and Showtime</h6>
                        <p class="text-muted">
                            {{ $booking->dateShowtime->date->date->format('D, j M Y') }} 
                            {{ $booking->dateShowtime->showtime->start_time }} - 
                            {{ $booking->dateShowtime->showtime->end_time }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-secondary">Total Price</h6>
                        <p class="text-muted">
                            Rp {{ number_format($booking->total_price) }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-secondary">Booking Status</h6>
                        <p>
                            @if ($booking->status->value == 'paid')
                                <span class="badge bg-success text-white">{{ strtoupper($booking->status->value) }}</span>
                            @else
                                <span class="badge bg-danger text-white">{{ strtoupper($booking->status->value) }}</span>
                            @endif
                        </p>
                    </div>
                    @if ($booking->status->value == 'paid')
                        <div class="col-md-6">
                            <h6 class="fw-semibold text-secondary">Seat Numbers</h6>
                            <p class="text-muted">
                                @foreach ($booking->seats as $seat)
                                    {{ $seat->seat_number }}{{ $loop->last ? '' : ',' }}
                                @endforeach
                            </p>
                        </div>
                    @endif
                </div>

                {{-- show cancel button if booking is not cancelled and date and showtime is not passed --}}
                @php
                    $formattedDate = $booking->dateShowtime->date->date->format('Y-m-d');
                    $isToday = $formattedDate == $currentDate;
                    $isPastDate = $formattedDate < $currentDate;
                    $isPastShowtime = $booking->dateShowtime->showtime->start_time < $currentTime;
                    $isCancelled = $isPastDate || ($isPastShowtime && $isToday) || $booking->status->value == 'cancelled';
                @endphp

                @if (!$isCancelled)
                    <div class="d-flex justify-content-center justify-content-md-end mt-4">
                        <form action="{{ route('bookings.update', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Cancel Booking
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
