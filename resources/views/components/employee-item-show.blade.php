@props(['food'])
    <div class="item" id="123">
        <div class="item-image">
            <!-- change image depending on the product -->
            <img src="{{ asset($food->attributes->thumbnail) }}" id="product-image">
        </div>
        <h3 id="flavor">{{ $food->name }}</h3>
        <p id="price-quantity">{{ $food->price * $food->quantity }}MAD<br><span class="quantity">Qty. {{ $food->quantity }}</span></p>
        <input type="hidden" name="id" value="{{ $food->id }}">
    </div>
