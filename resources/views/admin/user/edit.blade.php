@extends('admin.layouts.admin')

    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    @if(session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.users.update',$user) }}" method="POST" class="bg-white p-6 shadow rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded"
                   value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded"
                   value="{{ old('email', $user->email) }}">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password (optional)</label>
                <input type="password" name="password" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Role</label>
            <select name="role" class="w-full p-2 border rounded">
                <option value="">No role</option>
                @foreach($roles as $role)
                    <option value="{{ $role }}" @if($user->roles->pluck('name')->contains($role)) selected @endif>{{ $role }}</option>
                @endforeach
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>

