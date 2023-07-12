<x-layout-public>
    @push('title')
        <title>RIAD BARAKA</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/landing-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="title">
        <h1><span id="yellow">Riad</span> <span id="red">Baraka</span></h1>
        <h3>Experiance the flavors.<br><b> Sign up for a delicious journey!</b></h3>

        <a href="/HSignup"><button>Hotel guest</button></a>
        <a href="RSignup"><button>Restaurant guest</button></a>

    </div>
</x-layout-public>
