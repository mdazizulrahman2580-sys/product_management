@extends('admin.layouts.admin')

@section('content')

    @switch(Route::currentRouteName())

        @case('admin.products.create')
            <livewire:backend.admin.products.create />
        @break


        @case('admin.products.edit')
            <livewire:backend.admin.products.edit :id="request()->route('id')" />
        @break

        @case('admin.products.show')
            <livewire:backend.admin.products.show :id="request()->route('id')" />
        @break


        @default
            <livewire:backend.admin.products.index />
        @break

    @endswitch

@endsection
