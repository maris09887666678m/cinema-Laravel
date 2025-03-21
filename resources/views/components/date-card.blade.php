@props(['date'])

<div class="card shadow-sm mb-4">
    <div class="card-body text-center">
        <h5 class="card-title text-primary">{{ $date->date->format('D, j M Y') }}</h5>

        <ul class="list-unstyled">
            {{ $slot }}
        </ul>
    </div>
</div>
