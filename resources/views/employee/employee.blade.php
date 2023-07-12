<x-layout-employee>
    @push('title')
        <title>Order Queue</title>
    @endpush

    @push('styles')
        <link href="{{ asset('css/employee-styles.css') }}" rel="stylesheet">
    @endpush

    <!-- CONTENT -->
    <div class="header">
        <div class="content-margin">
            <x-success-message />

            <h1>Order Queue</h1>
            <a id="add-order" href="employee/new-order">+ Add Order</a>
        </div>
    </div>


    <div class="content-margin">
        <fieldset>
            <legend>Confirm Order</legend>
            <table>
                <x-employee-header-table />
                @if ($pending->count())
                    @foreach ($pending as $order)
                        <x-employee-order-list :order="$order" />
                    @endforeach

            </table>
        @else
            </table>

            <p style="font-weight: 800; font-size: 16px; text-align: center;">Sorry! Currently, there are no
                pending orders.</p>

            @endif
        </fieldset>

        <fieldset>
            <legend>Pending Completion</legend>
            <table>
                <x-employee-header-table />
                @if ($confirmed->count())
                    @foreach ($confirmed as $order)
                        <x-employee-order-list :order="$order" />
                    @endforeach

            </table>
        @else
            </table>

            <p style="font-weight: 800; font-size: 16px; text-align: center;">Sorry! Currently, there are no confirmed
                orders.</p>

            @endif

        </fieldset>

        <fieldset>
            <legend>Recently Completed Orders</legend>
            <table>
                <tr>
                    <th id="oddcol">Order ID</th>
                    <th id="evencol">Order Type</th>
                    <th id="oddcol">Amount</th>
                    <th id="evencol">Status</th>
                </tr>
                @if ($completed->count())
                    @foreach ($completed as $order)
                        <x-employee-completed-list :order="$order" />
                    @endforeach
            </table>
        @else
            </table>
            <p style="font-weight: 800; font-size: 16px; text-align: center;">Sorry! Currently, there are no
                completed orders.</p>

            @endif
        </fieldset>
    </div>
</x-layout-employee>
