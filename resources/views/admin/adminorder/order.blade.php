@extends('admin.layouts.admin')


@section('content')
    @switch(Route::currentRouteName())


        @case('admin.orders.create')
            <livewire:backend.admin.order.create />
        @break

        @case('admin.orders.edit')
            <livewire:backend.admin.order.edit :id="request()->route('id')" />
        @break

        @case('admin.orders.show')
           <livewire:backend.admin.order.show :id="request()->route('id')" />
        @break


    @default

 <livewire:backend.admin.order.index />
   @break
    @endswitch

@endsection
