<x-layout-end-user>
    @push('title')
        <title>RIAD BARAKA</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/landing-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="title">
        <h1><span id="yellow">Riad</span> <span id="red">Baraka</span></h1>
        <h3>Boneless Happiness, All Day, Everyday</h3>
        <a href="menu"><button>Order now</button></a>
    </div>
</x-layout-end-user>
