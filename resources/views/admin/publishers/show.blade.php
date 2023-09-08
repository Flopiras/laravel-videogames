@extends('layouts.app')

@section('content')
    @include('includes.publishers.modal')
    <div class="d-flex justify-content-center mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">
                    <img src="{{ $publisher->cover ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp41IWFGc4DITJ1TKcUvwLnSavXinocukcMc2y5fXEAtCWDx4bQFOU1srExMJLtp3Aklo&usqp=CAU' }}"
                        class="img-fluid h-100" alt="{{ $publisher->title }}">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $publisher->label }}</h5>
                        <p class="card-text text-body-secondary">Created at: {{ $publisher->created_at }}</p>
                        <p class="card-text text-body-secondary">Updated at: {{ $publisher->updated_at }}</p>
                        <div class="buttons d-flex gap-1">
                            {{-- back --}}
                            <a class="btn btn-primary" href="{{ route('admin.publishers.index') }}">Back</a>

                            {{-- edit --}}
                            <a class="btn btn-warning" href="{{ route('admin.publishers.edit', $publisher) }}">Edit</a>

                            {{-- delete --}}
                            <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                data-bs-target="#{{ $publisher->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
