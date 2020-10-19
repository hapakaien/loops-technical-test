@extends('layouts.app')

@section('content')
<div class="px-4 space-y-4">
    @if (session()->has('message-post'))
        <div class="bg-green-500 text-gray-100 py-2 px-3 rounded">
            {{ session('message-post') }}
        </div>
    @endif

    <livewire:content-post :posts="$posts"/>
</div>
@endsection
