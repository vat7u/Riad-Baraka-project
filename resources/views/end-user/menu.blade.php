<x-layout-end-user>
    @push('title')
        <title>Riad Baraka Menu</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/menu-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="header">
        <div class="content-margin">
            <h1>Riad Baraka Menu</h1>
            <p>Enjoy your meal with your Riad Baraka favorites!</p>
        </div>
    </div>

    {{-- <div class="functions">
        <x-search route="menu"/>
    </div> --}}

    <div class="cards">

        @if ($foods->count())
            @foreach ($foods as $food)
                <x-menu-card :food="$food" />
            @endforeach
        @else
            <p style="text-align: center; font-size: 30px; font-weight: 800">No posts yet. Please check back later.</p>
        @endif
    </div>
    <div class="functions">
        {{ $foods->links('vendor.pagination.simple-default') }}
    </div>
    <div class="none" style="height: 60px;"></div>
    <a href="{{ Route('checkout.index') }}" style="margin-bottom: 50px;text-decoration:none;position: fixed;bottom: 0;left: 0;width: 100%;padding: 20px;text-align: center;">
        <button id="checkout">Checkout</button>
    </a>
</x-layout-end-user>



