<div>
    {{-- In work, do what you enjoy. --}}
    <div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl">Orders</h2>

        {{-- Create Button --}}
        <a href="{{ route('admin.orders.create') }}"
           class="bg-blue-600 text-white px-3 py-2 rounded">
            + Create Order
        </a>
    </div>

    @if (session()->has('success'))
        <div class="p-2 bg-green-200 text-green-800 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Search orders..." class="border rounded p-2" />
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="border-b bg-gray-100">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Customer</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $o)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $o->id }}</td>
                    <td class="px-4 py-2">{{ $o->customer_name }}</td>
                    <td class="px-4 py-2">{{ $o->customer_email }}</td>
                    <td class="px-4 py-2">{{ $o->status }}</td>
                    <td class="px-4 py-2">{{ number_format($o->grand_total, 2) }}</td>

                    <td class="px-4 py-2 space-x-3">

                        {{-- View --}}
                        <a href="{{ route('admin.orders.show', $o->id) }}" class="text-blue-600">View</a>

                        {{-- Edit --}}
                        <a href="{{ route('admin.orders.edit', $o->id) }}" class="text-yellow-600">Edit</a>

                        {{-- Delete --}}
                        <button wire:click="deleteOrder({{ $o->id }})"
                                onclick="return confirm('Are you sure?')"
                                class="text-red-600">
                            Delete
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>


</div>
