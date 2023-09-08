@extends('layouts.app')

@section('content')
    {{-- Section Header --}}
    <header class="d-flex justify-content-between align-items-center mt-5">
        <h2>Edit</h2>
        <a href="{{ route('admin.videogames.index') }}" class="btn btn-secondary">Back</a>
    </header>

    @include('includes.consoles.form')
@endsection
