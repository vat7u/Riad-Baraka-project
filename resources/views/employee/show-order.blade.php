<x-layout-employee>
    @push('title')
        <title>Add Order page</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/add-order-styles.css') }}" rel="stylesheet">
    @endpush

    <!-- CONTENT -->
    <div class="header">
        <div class="content-margin">
            <h1>{{ $header . $orders->id }}</h1>
            <p>{{ $subtitle }}</p>
        </div>
    </div>

    <!-- ADD ITEM SECTION -->
    {{-- <div class="add-item">
        <form action="/employee/add-order" method="POST">
            @csrf
            <h2 id="heading">Add Item</h2>
            <div class="row">
                <div class="add-flavor">
                    <label for="item">Item</label>
                    <select name="id" required>
                        <option value="" disabled selected>Select Flavor</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="add-quantity">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" value="1" min="1" max="30">
                </div>

                <div class="add-button">
                    <input id="add-button" type="submit" value="+  Add Item" name="submit">
                </div>
            </div>
        </form>
    </div> --}}

    <!-- ITEMS ADDED -->
    <div class="items-added">
        <h2 id="heading"><h1>Items</h1></h2>

        <!-- LEFT SECTION-->
        <div class="leftside">
            @if ($foods->count())
                @foreach ($foods as $food)
                    <x-employee-item-show :food="$food" />
                @endforeach
            @else
                <p class="text-center">Cart is empty</p>
            @endif
        </div>

        <div class="column-mid"></div> <!-- column separator -->
        <hr id="divider"> <!-- row separator -->

        <!-- RIGHT SECTION-->
        <div class="rightside">
                <label id="label-type" for="user">User </label>
                    @foreach ($users as $user)
                        @if ($user->id == $orders->user_id)
                        <input id="promo" type="text" disabled value="{{ $user->firstname . ' ' . $user->lastname }}">
                        @endif
                    @endforeach
                    <br>

                <label for="type" id="label-type">Order Type </label>
                <select id="type" name="type" disabled >
                    <option value="1" @if (old('type') == '1') selected="selected" @endif>Dine In
                    </option>
                    <option value="2" @if (old('type') == '2') selected="selected" @endif>Takeout
                    </option>
                    <option value="3" @if (old('type') == '3') selected="selected" @endif>Delivery (+15MAD)
                    </option>
                </select><br>

                <label for="promo" id="label-type">Promo Code </label>
                <input id="promo" type="text" name="promo" disabled><br>

                <label for="table" id="label-type">Table Number</label>
                <input type="text" id="promo" name="table" value="{{$orders->table}}" disabled><br>

                <label id="label-total">Total </label>
                <p id="total-price">{{ $total }}MAD</p><br>

            <form action="{{route('edit-order')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $orders->id }}">
                <div class="buttons">
                    <button type="submit" id="cancel-button" name="submit" value="edit">Edit Order</button>
                </div>
            </form>
        </div>
    </div>

</x-layout-employee>
