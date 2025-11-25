<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">My Profile</h2>

    @if(session('success'))
        <div class="p-3 bg-green-100 text-green-700 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" wire:model="name" class="border p-2 w-full rounded">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" wire:model="phone" class="border p-2 w-full rounded">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" wire:model="address" class="border p-2 w-full rounded">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select wire:model="gender" class="border p-2 w-full rounded">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" wire:model="date_of_birth" class="border p-2 w-full rounded">
        </div>

        <div class="mb-3">
            <label>Profile Photo</label><br>

            @if($avatar)
                <img src="{{ asset('storage/' . $avatar) }}" class="w-20 h-20 rounded-full mb-2">
            @endif

            <input type="file" wire:model="newAvatar">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Profile
        </button>

    </form>
</div>

</div>
