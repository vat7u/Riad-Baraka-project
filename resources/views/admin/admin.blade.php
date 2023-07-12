<x-layout-admin>
    @push('title')
        <title>Admin Dashboard</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/menu-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="header">
        <div class="content-margin">
            <h1>Menu Manager</h1>
            <p>Verify and edit the current menu of the restaurant.</p>
        </div>
    </div>

    <x-success-message />

    <div class="functions">
        <x-search route="admin"/>
    </div>

    <div class="cards">
        @if ($foods->count())
            @foreach ($foods as $food)
                <x-admin-menu-card :food="$food" />
            @endforeach
        @else
            <p style="text-align: center; font-size: 30px; font-weight: 800">No food is prepared yet. Please check back
                later.</p>
        @endif
    </div>

    <div class="functions">
        {{ $foods->links('vendor.pagination.simple-default') }}
    </div><div class="none" style="height: 60px;"></div>

    {{-- ADD ITEM TO MENU --}}
    <a href="{{ Route('adminpage.create') }}" style="margin-bottom: 50px;text-decoration:none;position: fixed;bottom: 0;left: 0;width: 100%;padding: 20px;text-align: center;">
        <button id="checkout">+ Add Menu Item</button>
    </a>

    <br>


</x-layout-admin>
