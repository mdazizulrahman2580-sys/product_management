@extends('admin.layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">Users</h1>

<a href="{{ route('admin.users.create') }}" class="inline-block mb-4 px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
    Add User
</a>

<div class="overflow-x-auto rounded-lg shadow border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 text-left text-gray-700 font-semibold">Name</th>
                <th class="py-3 px-6 text-left text-gray-700 font-semibold">Email</th>
                <th class="py-3 px-6 text-left text-gray-700 font-semibold">Phone</th>
                <th class="py-3 px-6 text-left text-gray-700 font-semibold">Address</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-6">{{ $user->name }}</td>
                <td class="py-3 px-6">{{ $user->email }}</td>
                <td class="py-3 px-6">{{ $user->phone ?? '-' }}</td>
                <td class="py-3 px-6">{{ $user->address ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
