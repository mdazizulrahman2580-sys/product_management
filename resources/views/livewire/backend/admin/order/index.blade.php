<div>
    <div class="p-6 bg-white shadow rounded">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Orders</h2>

            <a href="{{ route('admin.orders.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                + Create Order
            </a>
        </div>

        {{-- Success Message --}}
        @if (session()->has('success'))
            <div class="p-3 bg-green-200 text-green-900 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search --}}
        <div class="mb-4">
            <input type="text" wire:model.live="search" placeholder="Search orders..."
                   class="border rounded px-4 py-2 w-1/3 shadow-sm">
        </div>

        {{-- Orders Table --}}
        <table class="table-auto w-full border-col
        lapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 font-semibold">ID</th>
                    <th class="px-4 py-2 font-semibold">Customer</th>
                    <th class="px-4 py-2 font-semibold">Email</th>
                    <th class="px-4 py-2 font-semibold">Status</th>
                    <th class="px-4 py-2 font-semibold">Total</th>
                    <th class="px-4 py-2 font-semibold">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $o)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-2">{{ $o->id }}</td>

                        <td class="px-4 py-2 font-medium">
                            {{ $o->customer_name }}
                        </td>

                        <td class="px-4 py-2">{{ $o->customer_email }}</td>

                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-white
                                @if($o->status == 'Pending') bg-yellow-500
                                @elseif($o->status == 'Processing') bg-blue-500
                                @elseif($o->status == 'Completed') bg-green-600
                                @else bg-gray-500
                                @endif">
                                {{ $o->status }}
                            </span>
                        </td>

                        <td class="px-4 py-2 font-semibold text-red-600">
                            ৳ {{ number_format($o->grand_total, 2) }}
                        </td>

                        <td class="px-4 py-2 space-x-4">

                            {{-- View --}}
                            <a href="{{ route('admin.orders.show', $o->id) }}"
                               class="text-blue-600 hover:underline">
                                View
                            </a>

                            {{-- My Orders (Frontend) --}}
                            <a href="{{ route('frontend.cart') }}" class="text-indigo-700 hover:underline">
                                My Orders
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('admin.orders.edit', $o->id) }}"
                               class="text-yellow-600 hover:underline">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <button wire:click="deleteOrder({{ $o->id }})"
                                    onclick="return confirm('Are you sure to delete?')"
                                    class="text-red-600 hover:underline">
                                Delete
                            </button>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-5">
            {{ $orders->links() }}
        </div>

    </div>
</div>
