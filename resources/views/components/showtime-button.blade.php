@props(['movie', 'date', 'showtime', 'currentDate', 'currentTime'])

@php
    // date formatting
    $formattedDate = $date->date->format('Y-m-d');
    $isToday = $formattedDate == $currentDate;
    $isPastDate = $formattedDate < $currentDate;
    $isPastShowtime = $showtime->start_time < $currentTime;
    $disabled = $isPastDate || ($isToday && $isPastShowtime);
@endphp

<li>
    <a href="{{ route('bookings.create', [$movie, $date, $showtime]) }}">
        <button type="button"
            class="btn {{ $disabled ? 'btn-secondary' : 'btn-primary' }} text-white
            hover:opacity-75 focus:outline-none focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-5 py-2.5 mr-2 mb-2
            {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
            {{ $disabled ? 'disabled' : '' }}>
            {{ $showtime->start_time }} - {{ $showtime->end_time }}
        </button>
    </a>
</li>
