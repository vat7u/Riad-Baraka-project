<x-layout-public>
    @push('title')
        <title>Sign up</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/signup-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="header">
        <div class="content-margin">
            <h1>Sign up</h1>
            <p>Create an account as hotel guest</p>
        </div>
    </div>

    <!-- CONTENT - Sign up Form-->
    <div class="row">
        <div class="column1">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <!-- action depending on isEmployee -->
                <h3 id="heading">Customer Information</h3>

                <div class="form-half">
                    <div class="form-left">
                        <label for="firstname">First Name</label><br>
                        <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
                    </div>
                    <div class="form-right">
                        <label for="lastname">Last Name</label><br>
                        <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required><br>
                    </div>
                </div>
                <br>

                <label for="address">Room number</label><br>
                <input type="text" name="room" placeholder="Enter your room number" value="{{ old('room') }}" required><br>
                <br>

                <div class="form-half">
                    <div class="form-left">
                        <label for="email">Email Address</label><br>
                        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required><br>
                    </div>
                    <div class="form-right">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" placeholder="Enter your password" required><br>
                    </div>
                </div>

                <br><br>
                <input type="submit" name="signup" value="Sign Up">

                {{-- Displays an error when inputs are invalid --}}
                <x-error-message/>

            </form>
        </div>

        <div class="column-mid"></div> <!-- column separator -->
        <div class="column2"></div> <!-- branch image -->
    </div>
</x-layout-public>
