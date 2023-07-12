<x-layout-end-user>
    @push('title')
        <title>Update Customer Information</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/update-styles.css') }}" rel="stylesheet">
    @endpush

    @php  //Used for form fields
        $user = auth()->user();
        $id = $user->id;
    @endphp

    <div class="header">
        <div class="content-margin">
            <h1>Update Customer Information</h1>
            <p>Please enter the required information below and save your profile.</p>
        </div>
    </div>

    <!-- CONTENT - Sign up Form-->
    <div class="row">
        <div class="column1">
                <form method="POST" role="form" action="{{route('users.update', $id)}}">
                    @csrf
                    @method('PUT')
                    <h3 id="heading">Customer Information</h3>

                    <div class="form-half">
                        <div class="form-left">
                            <label for="firstname">First Name</label><br>
                            <input type="text" name="firstname" value="{{ $user->firstname }}" required><br>
                        </div>
                        <div class="form-right">
                            <label for="lname">Last Name</label><br>
                            <input type="text" name="lastname" value="{{ $user->lastname }}" required><br>
                        </div>
                    </div>
                    <br>

                    <div class="form-half">
                        <div class="form-left">
                            <label for="email">Email Address</label><br>
                            <input type="email" name="email" value="{{ $user->email }}" required><br>
                        </div>
                        <div class="form-right">
                            <label for="password">Password</label><br>
                            <input type="password" name="password" value="" required><br>
                        </div>
                    </div>
                    {{-- Displays an error when inputs are invalid --}}
                    <x-error-message/>
                    <br><br>
                    <input type="submit" name="save" value="Save">
            </form>
        </div>

        <div class="column-mid"></div> <!-- column separator -->
        <div class="column2"></div> <!-- branch image -->
    </div>
</x-layout-end-user>
