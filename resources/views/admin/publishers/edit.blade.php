@extends('layouts.app')

@section('content')
    {{-- Section Header --}}
    <header class="d-flex justify-content-between align-items-center mt-5">
        <h2>Create new publisher</h2>
        <a href="{{ route('admin.publishers.index') }}" class="btn btn-secondary">Back</a>
    </header>

    @include('includes.publishers.form')
@endsection
