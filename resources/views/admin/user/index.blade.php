@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto px-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Users</h1>
            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                Add User
            </a>
        </div>

        @if (session('success'))
            <p class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </p>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-left">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Phone</th>
                        <th class="py-2 px-4">Address</th>
                        <th class="py-2 px-4">Gender</th>
                        <th class="py-2 px-4">Date of Birth</th>
                        <th class="py-2 px-4">Role</th>
                        <th class="py-2 px-4">Actions</th>
                        <th class="py-2 px-4">Avatar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $user->name }}</td>
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">{{ $user->phone }}</td>
                            <th class="py-2 px-4">{{ $user->address }}</th>
                            <td class="py-2 px-4">{{ $user->gender }}</td>
                            <td class="py-2 px-4">{{ $user->date_of_birth }}</td>
                            <td class="py-2 px-4">{{ $user->role }}</td>

                            <td class="py-2 px-4 space-x-2">
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="px-3 py-1 bg-blue-500 text-white rounded">
                                    View
                                </a>

                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="px-3  py-1 bg-yellow-500 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Are you sure?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>

                            </td>
                            <td class="py-2 px-4">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                        class="w-12 h-12 rounded-full object-cover border">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $users->links() }}
            </div>
        </div>

    </div>
@endsection
