@extends('layouts.base')

@section('title')
{{ $title }}
@endsection

@section('body')
    <div class="max-w-6xl mx-auto space-y-4">
        @include('layouts.header')
        
        @yield('content')
    </div>
@endsection
