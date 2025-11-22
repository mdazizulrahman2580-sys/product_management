
@extends('admin.layouts.admin')
@section('content')

<h1>Create User</h1>
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required><br>

    <button type="submit">Create User</button>
</form>

@endsection
