<form action="{{ route('home') }}" method="GET"> 
    <div class="input-group">
        <input type="search" id="search" name="search" class="form-control" placeholder="Search movie title" required value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>
