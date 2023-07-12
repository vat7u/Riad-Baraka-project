@props(['route'])

<div class="search">
    <form method="GET" action="{{ $route }}">
        <input type="text" name="search" placeholder="Search for something!" class="search-box"
            value="{{ request('search') }}">
    </form>
</div>
