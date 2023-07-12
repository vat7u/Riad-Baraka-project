<x-layout-public>
    @push('title')
        <title>Contact Us</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/contact-styles.css') }}" rel="stylesheet">
    @endpush

    <h1 id="title"><span id="yellow">Contact</span> <span id="red">Us</span></h1>

    <!-- CONTENT -->
    <div class="login content-margin">
        <div class="login-content">

            <div class="row">
                <a style="text-decoration: none; color: #232323;">
                    <div class="column1">

                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h3>05399-87961</h3>
                    </div>
                </a>
                <a href="#" style="text-decoration: none; color: #232323;">
                    <div class="column2">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>

                        <h3>Facebook</h3>
                    </div>
                </a>
                <a href="#" style="text-decoration: none; color: #232323;">
                    <div class="column3">
                        <i class="fa fa-instagram" aria-hidden="true"></i>

                        <h3>Instagram</h3>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-layout-public>
