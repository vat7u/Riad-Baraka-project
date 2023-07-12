<x-layout-admin>
    @push('title')
        <title>Create Menu Item</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/update-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="header">
        <div class="content-margin">
            <h1>Add Menu Item</h1>
            <p>Please enter the required information below.</p>
        </div>
    </div>

    <!-- CONTENT - Create Item Form-->
    <div class="row">
        <div class="column1">
                <form method="POST" role="form" action="{{route('adminpage.store')}}">
                    @csrf
                    <h3 id="heading">Item Information</h3>

                    <div class="form-half">
                        <div class="form-left">
                            <label for="name">Menu Item Name</label><br>
                            <input type="text" name="name" value="{{ old('name') }}" required><br>
                        </div>
                        <div class="form-right">
                            <label for="amount">Price (MAD)</label><br>
                            <input type="number" name="amount" value="{{ old('amount') }}" required><br>
                        </div>
                    </div>
                    <br>

                    <label for="description">Description</label><br>
                    <input type="text" name="description" value="{{ old('description') }}" required><br>
                    <br>

                    {{-- default thumbnail --}}
                    <label for="thumbnail">Thumbnail</label><br>
                    <input type="text" name="thumbnail" value="/images/24chicken-item-sample.jpg" required><br>
                    <br>

                    {{-- Displays an error when inputs are invalid --}}
                    <x-error-message/>
                    <br><br>
                    <input type="submit" name="save" value="Save">
            </form>
        </div>

        <div class="column-mid"></div> <!-- column separator -->
        <div class="column2"></div> <!-- branch image -->
    </div>
</x-layout-admin>
