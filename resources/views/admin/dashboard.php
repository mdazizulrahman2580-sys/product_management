@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Welcome, Admin!</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold">Total Users</h3>
            <p class="text-4xl font-bold mt-3">120</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold">New Orders</h3>
            <p class="text-4xl font-bold mt-3">35</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold">Revenue</h3>
            <p class="text-4xl font-bold mt-3">$4,500</p>
        </div>
        

    </div>
@endsection
