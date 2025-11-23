<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>

    <form wire:submit.prevent="update">

        <div class="mb-3">
            <label class="block font-medium">Name</label>
            <input type="text" wire:model="name" class="w-full border rounded p-2">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium">Price</label>
            <input type="number" wire:model="price" class="w-full border rounded p-2">
            @error('price') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium">Status</label>
            <select wire:model="status" class="w-full border rounded p-2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Update
        </button>
    </form>
</div>
                                                            

</div>
