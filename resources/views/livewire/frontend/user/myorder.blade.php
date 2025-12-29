
@extends('layouts.app')
@section('content')
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="p-6">
    <h2 class="text-xl font-bold mb-4">My Orders</h2>

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Order ID</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($orders as $o)
                <tr>
                    <td class="p-2 border">{{ $o->id }}</td>
                    <td class="p-2 border">{{ $o->status }}</td>
                    <td class="p-2 border">{{ $o->grand_total }} Tk</td>

                    <td class="p-2 border">
                        <a href="{{ route('product.details', $o->id) }}"
                           class="text-blue-600">
                           View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        No Orders Found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
@endsection