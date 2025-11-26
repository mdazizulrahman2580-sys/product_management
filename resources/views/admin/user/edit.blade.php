@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}"
          method="POST" class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>New Password (optional)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <button class="px-4 py-2 bg-yellow-600 text-white rounded">Update</button>

    </form>

</div>
@endsection
