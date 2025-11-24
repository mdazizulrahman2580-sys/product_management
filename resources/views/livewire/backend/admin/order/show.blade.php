<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="p-4">
    <h2 class="text-xl mb-4">Order #{{ $order->id }}</h2>

    <div class="mb-4">
        <strong>Customer Name:</strong> {{ $order->customer_name }} <br>
        <strong>Email:</strong> {{ $order->customer_email }} <br>
        <strong>Phone:</strong> {{ $order->customer_phone }} <br>
        <strong>Status:</strong> {{ $order->status }} <br>
        <strong>Payment Method:</strong> {{ $order->payment_method }} <br>
        <strong>Grand Total:</strong> {{ number_format($order->grand_total, 2) }} <br>
    </div>

    <h3 class="text-lg mb-2">Items</h3>
    <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
        <thead>
            <tr class="border-b">
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">SKU / Variant</th>
                <th class="px-4 py-2">Qty</th>
                <th class="px-4 py-2">Unit Price</th>
                <th class="px-4 py-2">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $item->product_name }}</td>
                    <td class="px-4 py-2">
                        @if ($item->variant)
                            {{ json_encode($item->variant) }}
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                    <td class="px-4 py-2">{{ number_format($item->unit_price, 2) }}</td>
                    <td class="px-4 py-2">{{ number_format($item->total_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{ route('admin.orders.index') }}" class="text-blue-600">Back to Orders</a>
    </div>
</div>



</div>
