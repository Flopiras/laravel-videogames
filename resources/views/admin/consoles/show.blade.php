@extends('layouts.app')

@section('content')
    @include('includes.consoles.modal')
    <div class="d-flex justify-content-center mt-5">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Console : <span class="fw-bold">{{ $console->name }}</span></h5>
                <p class="card-text">Color : <span class="fw-bold">{{ $console->color }}</span></p>

                <div class="buttons d-flex gap-1">
                    <a class="btn btn-primary" href="{{ route('admin.consoles.index') }}">Back</a>
                    <a class="btn btn-warning" href="{{ route('admin.consoles.edit', $console) }}">Edit</a>
                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                        data-bs-target="#{{ $console->id }}">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
