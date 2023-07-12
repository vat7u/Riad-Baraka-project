<x-layout-admin>
    @push('title')
        <title>Flavor Name</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/item-styles.css') }}" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="column1">
            <!-- BACKEND: change image depending on the item -->
            <img src="{{ asset($food->thumbnail) }}" id="product-image">
        </div>

        <div class="column2">
            <div class="vertical-center">
                <!-- BACKEND: change details depending on the item -->
                <h1 id="flavor">{{ $food->name }}</h1>
                <p id="description">{{ $food->description }}</p>
                <h3 id="price">MAD {{ $food->amount }}</h3>

                <hr id="divider">
                <br>

                <div class="quantity-container">
                    <div class="quantity-content">
                        <a class="button" href="{{ route('adminpage.edit',$food->id) }}" style="text-decoration: none">Edit</a>
                        <form method="POST" action="{{ route('adminpage.destroy', $food->id) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="delete">
                        </form>
                        <a href="{{ route('adminpage.index') }}" class="button" style="text-decoration: none">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
