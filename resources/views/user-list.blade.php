@extends('layouts.app')

@section('content')
<div class="px-4 space-y-4">
    @if (session()->has('message-user'))
        <div class="bg-green-500 text-gray-100 py-2 px-3 rounded">
            {{ session('message-user') }}
        </div>
    @endif

    <livewire:user-list :users="$users"/>
</div>
@endsection
