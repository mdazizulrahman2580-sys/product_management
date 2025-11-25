@extends('user.layouts.user')

@section('title', 'profile')

@section('content')

@switch(Route::currentRouteName())
    @case('user.profile.index')

        <livewire:backend.user.edit />

        @break
    @default

        <livewire:backend.user.profile />
        @break

@endswitch



@endsection
