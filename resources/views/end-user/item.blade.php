<x-layout-end-user>
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
                <h3 id="price">{{ $food->amount }}MAD</h3>

                <hr id="divider">
                <br>

                <div class="quantity-container">
                    <div class="quantity-content">
                        <form method="POST" action="{{ Route('checkout.store') }}">
                            @csrf
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" placeholder="1" min="1" value="1"
                                required>
                            <input type="hidden" name="id" value="{{ $food->id }}">
                            <input type="submit" name="add" value="add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</x-layout-end-user>
