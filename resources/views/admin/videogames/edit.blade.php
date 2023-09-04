@extends('layouts.app')

@section('content')
    {{-- Section Header --}}
    <header class="d-flex justify-content-between align-items-center mt-5">
        <h2>Edit</h2>
        <a href="{{ route('admin.videogames.index') }}" class="btn btn-secondary">Back</a>
    </header>

    <form action="{{ route('admin.videogames.update', $videogame) }}" method="POST" class="py-4">
        @csrf
        @method('PUT')
        <div class="row">

            {{-- Title --}}
            <div class="col-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title..."
                        value="{{ old('title', $videogame->title) }}">
                </div>
            </div>

            {{-- Year --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" class="form-control" id="year" name="year"
                        value="{{ old('year', $videogame->year) }}">
                </div>
            </div>

            {{-- Cover --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="url" class="form-control" id="cover" name="cover"
                        value="{{ old('cover', $videogame->cover) }}">
                </div>
            </div>

            {{-- Description --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="20">{{ old('description', $videogame->description) }}</textarea>
                </div>
            </div>

            <div class="col-12 text-end mt-3">
                <button class="btn btn-success" type="submit">Edit</button>
            </div>

        </div>

    </form>
@endsection
