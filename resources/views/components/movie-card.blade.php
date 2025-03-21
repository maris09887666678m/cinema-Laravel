<div class="card" style="width: 18rem;">
    <a href="{{ route('movies.show', $movie->id) }}">
        <img class="card-img-top" src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" />
    </a>
    <div class="card-body">
        <a href="{{ route('movies.show', $movie->id) }}">
            <h5 class="card-title text-dark" style="font-size: 1.25rem; font-weight: bold;">
                {{ mb_strimwidth($movie->title, 0, 20, '...') }}
            </h5>
        </a>
        <p class="card-text text-muted" style="font-size: 1rem;">
            {{ mb_strimwidth($movie->description, 0, 50, '...') }}
        </p>
    </div>
    <div class="card-footer bg-transparent border-top-0">
        <x-movie-info :movie="$movie" />
    </div>
</div>
