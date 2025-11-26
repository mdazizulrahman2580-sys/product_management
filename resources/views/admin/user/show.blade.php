@extends('admin.layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded">

    <h2 class="text-xl font-bold mb-4">User Details</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{$user->phone}}</p>
    <p><strong>Address:</strong> {{ $user->address }}</p>
    <p><strong>Gender:</strong> {{ $user->gender }}</p>
    <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
    <p><strong>Avatar:</strong>{{$user->avatar}}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p><strong>Created At:</strong> {{ $user->created_at->format('d M, Y') }}</p>

    <a href="{{ route('admin.users.index') }}"
       class="mt-4 inline-block px-4 py-2 bg-gray-600 text-white rounded">
        Back
    </a>

</div>
@endsection
