<div>
    {{-- In work, do what you enjoy. --}}
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Create Product</h1>

    <form wire:submit.prevent="save">

        <input type="text" wire:model="title" placeholder="Product Name"
               class="border p-2 w-full mb-3">

        <input type="number" wire:model="price" placeholder="Price"
               class="border p-2 w-full mb-3">


        <select wire:model="status" class="border p-2 w-full mb-3">
            <option value="1">Active</option>
            <option value="0">Inactive</option>

        </select>

        <input type="text" wire:model="description" placeholder="Description"
               class="border p-2 w-full mb-3">

               <input type="text" wire:model="discount_price" placeholder="Discount Price"
               class="border p-2 w-full mb-3">

        <input type="file" wire:model="avatar" class="border p-2 w-full mb-3">

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Save
        </button>

    </form>
</div>


</div>
