<x-layout-admin>
    @push('title')
        <title>Update Menu Item</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/update-styles.css') }}" rel="stylesheet">
    @endpush
    
    <div class="header">
        <div class="content-margin">
            <h1>Update Menu Item</h1>
            <p>Please enter the required information below.</p>
        </div>
    </div>
    <!-- CONTENT - Update Item Form-->
    <div class="row">
        <div class="column1">
                <form method="POST" role="form" action="{{route('adminpage.update', $food->id)}}">
                    @csrf
                    @method('PUT')
                    <h3 id="heading">Item Information</h3>

                    <div class="form-half">
                        <div class="form-left">
                            <label for="name">Menu Item Name</label><br>
                            <input type="text" name="name" value="{{ $food->name }}" required><br>
                        </div>
                        <div class="form-right">
                            <label for="amount">Price</label><br>
                            <input type="number" name="amount" value="{{ $food->amount }}" required><br>
                        </div>
                    </div>
                    <br>

                    <label for="description">Description</label><br>
                    <input type="text" name="description" value="{{ $food->description }}" required><br>
                    <br>

                    <label for="thumbnail">Thumbnail</label><br>
                    <input type="text" name="thumbnail" value="{{ $food->thumbnail }}" required><br>
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
