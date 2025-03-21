<div class="d-flex">
   
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by: @if (request('sort')) {{ ucwords(request('sort')) }} @endif
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'release date']) }}">Release Date</a></li>
            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'age rating']) }}">Age Rating</a></li>
            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'ticket price']) }}">Ticket Price</a></li>
        </ul>
    </div>
</div>
