<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="p-4">
    <h2 class="text-xl mb-4">Edit Order</h2>

    @if (session()->has('success'))
        <div class="p-2 bg-green-200 text-green-800 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">

        <div>
            <label>Customer Name</label>
            <input type="text" wire:model="customer_name" class="border p-2 w-full">
            @error('customer_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Customer Email</label>
            <input type="email" wire:model="customer_email" class="border p-2 w-full">
            @error('customer_email') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Status</label>
            <input type="text" wire:model="status" class="border p-2 w-full">
            @error('status') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Total Amount</label>
            <input type="number" wire:model="grand_total" class="border p-2 w-full">
            @error('grand_total') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Order
        </button>
    </form>
</div>

</div>
