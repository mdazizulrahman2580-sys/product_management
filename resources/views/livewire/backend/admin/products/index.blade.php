<div>
   {{-- Care about people's approval and you will be their prisoner. --}}


   <div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Products</h1>
        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">
           + Add New
        </a>
    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Price</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="border p-2">{{ $product->id }}</td>
                <td class="border p-2">{{ $product->name }}</td>
                <td class="border p-2">{{ $product->price }}</td>
                <td class="border p-2">
                    {{ $product->status ? 'Active' : 'Inactive' }}
                </td>
                <td class="border p-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="text-blue-600">
                       Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                                            
</div>
