<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>

    <form wire:submit.prevent="update">

        <input type="text" wire:model="title" class="border p-2 w-full mb-3">

        <input type="number" wire:model="price" class="border p-2 w-full mb-3">

        <select wire:model="status" class="border p-2 w-full mb-3">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Update
        </button>

    </form>
</div>


</div>
