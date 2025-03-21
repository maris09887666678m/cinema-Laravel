<span
    class="badge bg-primary text-white text-sm font-medium m-0.5 px-2.5 py-0.5 rounded">
    Released: {{ explode('-', $movie->release_date)[0] }}
</span>
<span
    class="badge bg-danger text-white text-sm font-medium m-0.5 px-2.5 py-0.5 rounded">
    Age Rating: {{ $movie->age_rating }}
</span>
<span
    class="badge bg-success text-white text-sm font-medium m-0.5 px-2.5 py-0.5 rounded">
    Price: Rp {{ number_format($movie->ticket_price) }}
</span>

