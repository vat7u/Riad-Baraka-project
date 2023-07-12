@props(['order'])

<tr>
    <td id="oddcol2">{{ $order->id }}</td>
    <td id="evencol2">
        @if ($order->order_type_id == 1)
            DINE-IN
        @elseif ($order->order_type_id == 2)
            TAKE-OUT
        @elseif ($order->order_type_id == 3)
            DELIVERY
        @endif
    </td>
    <td id="oddcol2">{{ $order->amount }}MAD</td>
    <td id="evencol2">COMPLETED</td>
</tr>
